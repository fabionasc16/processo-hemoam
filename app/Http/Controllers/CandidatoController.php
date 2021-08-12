<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\CargoProcesso;
use App\Escolaridade;
use App\FuncaoCargo;
use App\Http\Requests\CandidatoStore;
use App\Http\Requests\ProcessoCandidatoStore;
use App\Profile;
use App\Sexo;
use App\User;
use App\Utils\ConstUtils;
use App\Utils\Globals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Request as rq;
use App\Utils\ValidaCpfCnpj;

class CandidatoController extends Controller
{

    public function index()
    {
        //$cargo = CargoProcesso::orderBy('id')->get();
        //return view('candidato.cadastro.inicio', compact('cargo'));
        return view('candidato.cadastro.inicio');
    }

   /* public function show(){
        return view('candidato.cadastro.form-sucesso');
    }*/

    public function mensagemSucesso(){
        return view('candidato.cadastro.form-sucesso');
    }

    public function mensagemSucessoUsuario(){
        return view('candidato.cadastro.form-sucesso-usuario-cadastrado');
    }

   /* public function create(Request $request){*/
    public function createCadastro(Request $request){

        if(empty( $request->cpf)){
            rq::session()->flash('status-not', 'O campo CPF é obrigatório');
            return redirect()->back();
        }else{

            $cpf_ = new ValidaCpfCnpj( $request->cpf);

            if (!$cpf_->valida() ) {

                rq::session()->flash('status-not', 'CPF inválido.');
                return back()->withInput();
            }

            $cpfsemponto = Globals::limpaCPF_CNPJ($request->cpf);
            $existeCpf = Candidato::where('cpf', $cpfsemponto)->count();

            if($existeCpf > 0){
                rq::session()->flash('status-not', 'Cpf ' . $request->cpf . ' já cadastrado.');
                return back()->withInput();
            }
        }

        $cpf = $request->cpf;
        $escolaridade = Escolaridade::all();
        $sexo = Sexo::all();
        $estado_civil = \App\EstadoCivil::all();

        return view('candidato.cadastro.form', compact('cpf', 'escolaridade', 'sexo', 'estado_civil'));
    }

    public function store(CandidatoStore $request)
    {
        $candidato = new Candidato();

        $campo2 = $request->campo2;

        if($request->cpf != $campo2){
            rq::session()->flash('status-not', 'O campo CPF está inconsistente!');
            return redirect()->action('CandidatoController@index');
        }

        $cpfsemponto = Globals::limpaCPF_CNPJ($request->cpf);

        $candidato->nome = strtoupper($request->nome);
        $candidato->cpf = $cpfsemponto;
        $candidato->nascimento = $request->nascimento;
        $candidato->estado_civil = $request->estado_civil;
        $candidato->nacionalidade = $request->nacionalidade;
        $candidato->naturalidade = $request->naturalidade;
        $candidato->rg = $request->rg;
        $candidato->orgao_emissor = $request->orgao_emissor;
       /* $candidato->pis_pasep = $request->pis_pasep;
        $candidato->titulo_eleitor = $request->titulo_eleitor;
        $candidato->cert_reservista = $request->cert_reservista;
        $candidato->reg_conselho = $request->reg_conselho;*/
        $candidato->id_escolaridade = $request->id_escolaridade;
        $candidato->sexo = $request->sexo;
        $candidato->nome_mae = strtoupper($request->nome_mae);
        $candidato->nome_pai = strtoupper($request->nome_pai);
        $candidato->email = $request->email;
        $candidato->telefone = $request->telefone;
        $candidato->endereco = $request->endereco;
        $candidato->cep = $request->cep;
        $candidato->cidade = $request->cidade;
        $candidato->uf = $request->uf;
        $candidato->local_nascimento = $request->local_nascimento;

        DB::beginTransaction();
        try {

            $user = new User();
            $user->name = $candidato->nome;
            $user->email = $candidato->email;
            $user->cpf = $candidato->cpf;
            $user->password = $request->senha;
            $user->tipo_usuario = ConstUtils::PERFILCANDIDATO_ID;

            $senha = $request->senha;
            $confirmarSenha = $request->confirm_senha;

            $tamanhoSenha = strlen($senha);
            //Removerá todos os espaços do username
            $senhaSemEspaco = str_replace(" ", "", trim($senha));

            if(!$senha || !$confirmarSenha){
                rq::session()->flash('status-not', 'É necessário informar todos os Dados para acesso ao sistema!');
                return redirect()->back()->withInput();
            }

            if($senha != $senhaSemEspaco){
                rq::session()->flash('status-not', 'A senha não deve conter espaços em branco!');
                return redirect()->back()->withInput();
            }

            if($tamanhoSenha < 8) {
                rq::session()->flash('status-not', 'A senha deve conter no mínimo 8 caracteres!');
                return redirect()->back()->withInput();
            }

            if ($senha != $confirmarSenha){
                rq::session()->flash('status-not', 'A confirmação de senha é diferente da senha. Digite novamente!');
                return redirect()->back()->withInput();
            }

            //verifica se já existe usuario cadastrado com email existente para outro cpf
            if(CandidatoController::emailJaExisteOutroUsuario($user)){
                DB::rollback();
                rq::session()->flash('status-not', 'O email informado já está sendo utilizado
                    para outro usuário. Informe outro email válido.');
                return redirect()->back()->withInput();
            }

            $usuarioJaExistiaNoSistema = 0;

            //verifica se já existe usuário com o cpf cadastrado
            if(CandidatoController::usuarioCpfJaExiste($user)){
                $usuario = CandidatoController::getUsuario($user);

                // atualizar perfil do usuário para perfil Candidato
                $usuario->tipo_usuario = ConstUtils::PERFILCANDIDATO_ID;
                $updateperfil = $usuario->save();
                if(!$updateperfil){
                    DB::rollback();
                    rq::session()->flash('status-not', 'Operação não realizada! Ocorreu um erro ao salvar perfil de usuário. Tente novamente.');
                    return redirect()->back()->withInput();
                }

                $candidato->user_id = $usuario->id;

                $usuarioJaExistiaNoSistema = 1;

            // se não existe usuário, cadastrar
            }else{

                $criarCandidato = CandidatoController::createUser($user);

                if(!$criarCandidato){
                    DB::rollback();
                    rq::session()->flash('status-not', 'Operação não realizada! Ocorreu um erro ao cadastrar usuário. Contacte o administrador.');
                    return redirect()->back()->withInput();
                }else{
                    $candidato->user_id = $criarCandidato->id;
                }
            }

            if(!$candidato->user_id){
                DB::rollback();
                rq::session()->flash('status-not', 'Operação não realizada! Ocorreu um erro ao associar usuário. Contacte o administrador.');
                return redirect()->back()->withInput();
            }

            //cadastrar candidato
            $save = $candidato->save();

            if($save && $usuarioJaExistiaNoSistema){
                DB::commit();
                rq::session()->flash('status', 'Cadastro realizado com sucesso');
                return redirect()->action('CandidatoController@mensagemSucessoUsuario');

            }elseif ($save && !$usuarioJaExistiaNoSistema){
                DB::commit();
                rq::session()->flash('status', 'Cadastro realizado com sucesso');
                return redirect()->action('CandidatoController@mensagemSucesso');
            }
            else{
                DB::rollback();
                rq::session()->flash('status-not', 'Operação não realizada! Ocorreu um erro ao salvar os dados.');
                return redirect()->back()->withInput();
            }

        }catch (Exception $e){
            DB::rollback();
            rq::session()->flash('status-not', 'Operação não realizada! '.$e->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Ocorreu um erro ao salvar.Tente enviar Novamente!')
                ->withInput();
        }
    }

    protected function createUser($user)
    {
        $password = $user->password;
        $user->password = Hash::make($password);

        $save = $user->save();

        if(!$save){
            return 0;
        }

        return $user;

    }

    public function usuarioCpfJaExiste($user)
    {
        $existeCpf = User::where('cpf', $user->cpf)->first();

        if($existeCpf){
            return 1;
        }

        return 0;
    }

    public function getUsuario($user)
    {
        $candidato = User::where('cpf', $user->cpf)
            ->orderByDesc('id')
            ->first();

        return $candidato;
    }

    //verifica se email ja está cadastrado para outro usuario
    public function emailJaExisteOutroUsuario($user)
    {
        $existeEmail = User::where('email', $user->email)
            ->where('cpf', '!=', $user->cpf)
            ->first();

        if($existeEmail){
            return 1;
        }

        return 0;
    }



}
