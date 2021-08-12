<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\Cargo;
use App\Escolaridade;
use App\FuncaoCargo;
use App\Funcoes;
use App\Http\Requests\ProcessoCandidatoStore;
use App\Inscricao;
use App\Profile;
use App\Sexo;
use App\Unidade;
use App\Utils\ConstUtil;
use App\Utils\ConstUtils;
use App\Utils\Globals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Request as rq;

class InscricaoCandidatoController extends Controller
{
    public function index()
    {
        $userid = Auth::user()->id;

        $candidato = Candidato::where('user_id', $userid)->orderByDesc('id')->first();

        if(!$candidato || !$userid){
            rq::session()->flash('status-not', 'Operação não realizada! Ocorreu um erro ao capturar dados do candidato.');
            return redirect()->action('HomeController@index');
        }

        $sexo = Sexo::all();
        $escolaridade = Escolaridade::all();
        $estado_civil = \App\EstadoCivil::all();

        //retornar passo 1
        return view('candidato.inscricao.form-dados-pessoais', compact('candidato', 'sexo', 'escolaridade',  'estado_civil'));
    }

    //Botão da tela dados pessoais
    public function prosseguirParaPasso2()
    {
        //$unidades = Unidade::orderBy('name')->get();

        $funcoes = Funcoes::orderBy('unidade_id', 'asc')
            ->orderBy('nivel_id', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        return view('candidato.inscricao.form-dados-opcao', compact('funcoes'));

    }

    //pne e cargo
    //Botão em escolha de função
    public function prosseguirParaPNE(Request $request)
    {
        $funcao = $request->funcao;

        if(!$funcao){
            rq::session()->flash('status-not', 'Selecione a função.');
            return redirect()->back();
        }

        try {
            $candidato = Candidato::candidatoLogado();

            $inscricao = new Inscricao();
            $inscricao->funcao_id = $funcao;
            $inscricao->candidato_id = $candidato->id;
            $inscricao->statusinscricao = 2; //Rascunho

            $save = $inscricao->save();

            if(!$save){
                rq::session()->flash('status-not', 'Ocorreu um erro interno. Tente novamente mais tarde.');
                return redirect()->back();
            }

            $inscricaoid = $inscricao->id;

            $cargos = Cargo::join('funcao_cargo','funcao_cargo.cargo_id', 'cargos.id')
                ->where('funcao_id', $funcao)
                ->orderBy('name')->get();

            return view('candidato.inscricao.form-dados-opcao_PNE', compact('cargos', 'inscricaoid'));

        }catch (Exception $e){
            rq::session()->flash('status-not', 'Operação não realizada! '.$e->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Ocorreu um erro ao salvar.Tente enviar Novamente!')
                ->withInput();
        }

    }


    //Botão em PNE
    public function prosseguirParaAnexo(Request $request)
    {
        $cargo = $request->cargo;
        $possuipne = $request->pne;
        $tipo_deficiencia = $request->tipo_deficiencia;
        $cid_pne = $request->cid_pne;
        $ciente_pne = $request->ciente_pne;
        $laudo = $request->caminho_laudomedico;
        $inscricaoid = $request->inscricaoid;

        if(!$cargo){
            rq::session()->flash('status-not', 'Selecione o Cargo desejado.');
            return redirect()->back()->withInput();
        }

        if($possuipne && (!$tipo_deficiencia || !$cid_pne || !$ciente_pne)){
            rq::session()->flash('status-not', 'Os campos relacionado a PNE devem estar preenchidos.');
            return redirect()->back()->withInput();
        }

        if($possuipne && !$request->hasFile('caminho_laudomedico')){
            rq::session()->flash('status-not', 'É necessário anexar o laudo médico.');
            return redirect()->back()->withInput();
        }

        try {

            $inscricao = Inscricao::findOrFail($inscricaoid);

            $funcao = Funcoes::where('id', $inscricao->funcao_id)->first();
            $nivelid = $funcao->nivel_id;

            $inscricao->cargo_id = $cargo;
            $inscricao->pne = $possuipne;

            if($possuipne){
                $inscricao->tipo_deficiencia = $tipo_deficiencia;
                $inscricao->cid_pne = $cid_pne;

                $docDesc = 'Laudo Médico';
                $pathDoc = ConstUtils::CAMINHO_LAUDO_MEDICO.'/';
                $arquivoType = 'caminho_laudomedico';
                $inicioFileName = 'LAUDO';
                $fileName = InscricaoCandidatoController::nomeArquivo($request, $inicioFileName, $arquivoType);

                $upload = InscricaoCandidatoController::realizarUpload($request, $arquivoType, $pathDoc , $fileName, $docDesc);
                if($upload !== '1'){
                    return $upload;
                }
                $inscricao->caminho_laudomedico =  $pathDoc.$fileName;


            }else{
                $inscricao->tipo_deficiencia = null;
                $inscricao->cid_pne = null;
                $inscricao->caminho_laudomedico = NULL;
            }

            $save = $inscricao->save();

            if(!$save){
                rq::session()->flash('status-not', 'Ocorreu um erro interno. Tente novamente mais tarde.');
                return redirect()->back();
            }
            return view('candidato.inscricao.form-anexo-todas-funcoes', compact('inscricaoid', 'nivelid'));

        }catch (Exception $e){
            rq::session()->flash('status-not', 'Operação não realizada! '.$e->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Ocorreu um erro ao salvar.Tente enviar Novamente!')
                ->withInput();
        }

    }

    /****** VALIDAÇÕES JQUERY *******/
    public function validarDoc(Request $request)
    {
        $tipodoc = $request->tipo;

       /* if($tipodoc!='caminhoRG' && $tipodoc!='caminhoCPF' && $tipodoc!='caminhoCertidao'
            && $tipodoc!='caminhoResidencia' && $tipodoc!='caminhoEsocial') {
            return response()->json(['errors' => ['mensagem' => ['Ocorreu uma falha ao anexar documento.']]]);
        }*/

        //verifica se existe arquivo, pois caso ele clique em cancelar, no modal, ele exclui o file
        if($request->hasFile('file')) {

            $validator = \Validator::make($request->all(), [
                'file' => 'file|max:5000', //5MB
                ],
                $messages = [
                    'file.max' => 'O arquivo deve possuir tamanho máximo de 5MB .',
                ]
            );

            $fileisValid = $request->file('file')->isValid();

            if(!$fileisValid){
                return response()->json(['errors' => ['mensagem' => ['Arquivo não é válido.']]]);
            }

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $extension = $request->file('file')->getClientMimeType();

            if($extension != 'application/pdf'){
                return response()->json(['errors' => ['mensagem' => ['Arquivo deve ser do tipo pdf.']]]);
            }

        }//fim se existe arquivo
    }


    public function validarDocLaudoMedico(Request $request)
    {

        //verifica se existe arquivo, pois caso ele clique em cancelar, no modal, ele exclui o file
        if($request->hasFile('file')) {

            $validator = \Validator::make($request->all(), [
                'file' => 'file|max:2000', //2MB
            ],
                $messages = [
                    'file.max' => 'O arquivo deve possuir tamanho máximo de 2MB .',
                ]
            );

            $fileisValid = $request->file('file')->isValid();

            if(!$fileisValid){
                return response()->json(['errors' => ['mensagem' => ['Arquivo não é válido.']]]);
            }

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $url = $request->file('file');
            $extensaoArquivo = $url->extension(); //recupera sua extensão

            if (strtoupper($extensaoArquivo) != 'PNG' && strtoupper($extensaoArquivo) != 'JPEG'
                && strtoupper($extensaoArquivo) != 'JPG'){

                rq::session()->flash('status-not', 'Documento não possui a extensão permitida PNG, JPG ou JPEG!');
                return response()->json(['errors' => ['mensagem' => ['Documento não possui a extensão permitida PNG, JPG ou JPEG!']]]);
            }

        }//fim se existe arquivo
    }
    /****** FIM VALIDAÇÕES JQUERY *******/

    //retorna o nome do arquivo para upload
    public function nomeArquivo($request, $inicioFileName, $arquivoType){

        $url = $request->file($arquivoType);

        $extensaoArquivo = $url->extension(); //recupera sua extensão

        $fileName = $inicioFileName.Globals::limpaCPF_CNPJ($request->cpf).'_'.date('dmYhms').".".$extensaoArquivo;

        return $fileName;
    }

    //fazer o upload do arquivo
    public function realizarUpload($request, $arquivotype, $pathDoc, $fileName, $docDesc){

        $url = $request->file($arquivotype);

        $path = $pathDoc;
        $url->storeAs($path,$fileName,'public');
        if(!$url){ //se não seu certo o upload
            rq::session()->flash('status-not', 'Falha ao salvar o arquivo '.$docDesc.'.Tente novamente!');
            return redirect()
                ->back()
                ->with('error', 'Falha ao fazer upload de '.$docDesc.'.')
                ->withInput();
        }

        return '1';
    }

    public function mensagemSucesso(){
        return view('candidato.inscricao.inscricao_sucesso');
    }



}
