<?php

namespace App\Http\Controllers;

use App\Escolaridade;
use App\FuncaoCargo;
use App\Http\Requests\ProcessoCandidatoStore;
use App\Profile;
use App\Sexo;
use App\Utils\ConstUtils;
use App\Utils\Globals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Request as rq;

class ProcessoCandidatoController extends Controller
{

    public function index()
    {
    }

    /*public function exibirTelaProcesso(Request $request)*/
    public function create(Request $request){

        $cargo_processo = $request->cargo_processo;
        $funcao= FuncaoCargo::where('cargo_processo_id','=',$cargo_processo)->get();

        // se cargo igual a um entao chama funcoes
        $sexo = Sexo::all();
        $escolaridade = Escolaridade::all();
        $cpf = $request->cpf;
        $estado_civil = \App\EstadoCivil::all();

        //$funcao = \App\FuncaoCargo::all();

        // return view('profiles.formulario', compact('cpf','funcao','escola', 'sexo'));
        return view('candidato.processo.form', compact('cpf', 'cargo_processo', 'funcao',
            'escolaridade', 'estado_civil', 'sexo'));
    }

    public function show(Request $request)
    {


    }

   /* public function show(Request $request)
    {
        //$cpf = $request->cpf;
        //$cargo_processo = $request->cargo_processo;

        $cpf = '922.111.222-00';
        $cargo_processo = 1;

        $funcao = \App\FuncaoCargo::all();
        $escolaridade = \App\Escolaridade::all();
        $estado_civil = \App\EstadoCivil::all();

        if ($cargo_processo == 1) {
            return view('candidato.processo.form', compact('cpf', 'cargo_processo', 'funcao',
                'escolaridade', 'estado_civil'));
        }

    }*/

     // teste
    public function store(Request $request)
    {
        $profiles = new Profile();

        //EXPERIENCIA 1
        if ($request->hasFile('caminho_experiencia_1')){

            $docDesc = 'Experiência 1';
            $pathDoc = ConstUtils::CAMINHO_ARQUIVO_EXPERIENCIA_1.'/';
            $arquivoType = 'caminho_experiencia_1';
            $inicioFileName = 'EXPERIENCIA_1_';
            $fileName = ProcessoCandidatoController::nomeArquivo($request, $inicioFileName, $arquivoType);

            $validarArquivo = ProcessoCandidatoController::validacoesExperiencia($request, $docDesc, $arquivoType );
            if($validarArquivo !== '1'){
                return $validarArquivo;
            }

            $upload = ProcessoCandidatoController::realizarUpload($request, $arquivoType, $pathDoc , $fileName, $docDesc);
            if($upload !== '1'){
                return $upload;
            }

            $profiles->experiencia_1 = $request->experiencia_1;
            $profiles->meses_1 = $request->meses_1;
            $profiles->caminho_experiencia_1 =  $pathDoc.$fileName;
        }

        //EXPERIENCIA 2
        if ($request->hasFile('caminho_experiencia_2')){

            $docDesc = 'Experiência 2';
            $pathDoc = ConstUtils::CAMINHO_ARQUIVO_EXPERIENCIA_2.'/';
            $arquivoType = 'caminho_experiencia_2';
            $inicioFileName = 'EXPERIENCIA_2_';
            $fileName = ProcessoCandidatoController::nomeArquivo($request, $inicioFileName, $arquivoType);

            $validarArquivo = ProcessoCandidatoController::validacoesExperiencia($request, $docDesc, $arquivoType );
            if($validarArquivo !== '1'){
                return $validarArquivo;
            }

            $upload = ProcessoCandidatoController::realizarUpload($request, $arquivoType, $pathDoc , $fileName, $docDesc);
            if($upload !== '1'){
                return $upload;
            }

            $profiles->experiencia_2 = $request->experiencia_2;
            $profiles->meses_2 = $request->meses_2;
            $profiles->caminho_experiencia_2 = $pathDoc.$fileName;
        }

        //EXPERIENCIA 3
        if ($request->hasFile('caminho_experiencia_3')){

            $docDesc = 'Experiência 3';
            $pathDoc = ConstUtils::CAMINHO_ARQUIVO_EXPERIENCIA_3.'/';
            $arquivoType = 'caminho_experiencia_3';
            $inicioFileName = 'EXPERIENCIA_3_';
            $fileName = ProcessoCandidatoController::nomeArquivo($request, $inicioFileName, $arquivoType);

            $validarArquivo = ProcessoCandidatoController::validacoesExperiencia($request, $docDesc, $arquivoType );
            if($validarArquivo !== '1'){
                return $validarArquivo;
            }

            $upload = ProcessoCandidatoController::realizarUpload($request, $arquivoType, $pathDoc , $fileName, $docDesc);
            if($upload !== '1'){
                return $upload;
            }

            $profiles->experiencia_3 = $request->experiencia_3;
            $profiles->meses_3 = $request->meses_3;
            $profiles->caminho_experiencia_3 = $pathDoc.$fileName;

        }




        $saveProfile = $profiles->save();

        if($saveProfile){
            DB::commit();
            rq::session()->flash('status', 'Salvo com sucesso');

        }else{
            DB::rollback();
            rq::session()->flash('status-not', 'Operação não realizada! Ocorreu um erro ao salvar os dados.');
        }

        return redirect()
            ->back();
    }

    public function store2(ProcessoCandidatoStore $request)
    {
        $profiles = new Profile();

        $profiles->nome = strtoupper($request->nome);
        $profiles->cpf = $request->cpf;
        $profiles->nascimento = $request->nascimento;
        $profiles->estado_civil = $request->estado_civil;
        $profiles->nacionalidade = $request->nacionalidade;
        $profiles->naturalidade = $request->naturalidade;
        $profiles->rg = $request->rg;
        $profiles->orgao_emissor = $request->orgao_emissor;
        $profiles->pis_pasep = $request->pis_pasep;
        $profiles->titulo_eleitor = $request->titulo_eleitor;
        $profiles->cert_reservista = $request->cert_reservista;
        $profiles->reg_conselho = $request->reg_conselho;
        $profiles->id_escolaridade = $request->id_escolaridade;
        $profiles->sexo = $request->sexo;
        $profiles->nome_mae = strtoupper($request->nome_mae);
        $profiles->nome_pai = strtoupper($request->nome_pai);
        $profiles->email = $request->email;
        $profiles->telefone = $request->telefone;
        $profiles->endereco = $request->endereco;
        $profiles->cep = $request->cep;
        $profiles->cidade = $request->cidade;
        $profiles->uf = $request->uf;
        $profiles->id_funcao_cargo = $request->id_funcao_cargo;
        $profiles->local_nascimento = $request->local_nascimento;

        DB::beginTransaction();

        try {

            /********** INÍCIO COMPROVANTE EXPERIÊNCIA **********/

            // EXPERIÊNCIA 1
            if ($request->hasFile('caminho_experiencia_1')){
               $exp1 = ProcessoCandidatoController::salvarArquivoExperiencia($request, 'caminho_experiencia_1');

                if($exp1 == '0' || !$exp1){
                    rq::session()->flash('status-not', 'Operação não realizada! Ocorreu um erro ao salvar os dados de experiência 1.');
                    return redirect()->back()->withInput();
                }

                $profiles->experiencia_1 = $request->experiencia_1;
                $profiles->meses_1 = $request->meses_1;
                $profiles->caminho_experiencia_1 = $exp1;
            }

            // EXPERIÊNCIA 2
            if ($request->hasFile('caminho_experiencia_2')){
                $exp2 = ProcessoCandidatoController::salvarArquivoExperiencia($request, 'caminho_experiencia_2');

                if($exp2 == '0' || !$exp2){
                    rq::session()->flash('status-not', 'Operação não realizada! Ocorreu um erro ao salvar os dados de experiência 2.');
                    return redirect()->back()->withInput();
                }

                $profiles->experiencia_2 = $request->experiencia_2;
                $profiles->meses_2 = $request->meses_2;
                $profiles->caminho_experiencia_2 = $exp2;
            }

            // EXPERIÊNCIA 3
            if ($request->hasFile('caminho_experiencia_3')){
                $exp3 = ProcessoCandidatoController::salvarArquivoExperiencia($request, 'caminho_experiencia_3');

                if($exp3 == '0' || !$exp3){
                    rq::session()->flash('status-not', 'Operação não realizada! Ocorreu um erro ao salvar os dados de experiência 3.');
                    return redirect()->back()->withInput();
                }

                $profiles->experiencia_3 = $request->experiencia_3;
                $profiles->meses_3 = $request->meses_3;
                $profiles->caminho_experiencia_3 = $exp3;
            }

            /********** FIM COMPROVANTE EXPERIÊNCIA **********/

            /********** INÍCIO DOCUMENTAÇÃO **********/

            //RG
            if ($request->hasFile('caminho_rg')){

                $docDesc = 'Identidade com Foto';
                $pathDoc = ConstUtils::CAMINHO_ARQUIVO_RG.'/';
                $arquivoType = 'caminho_rg';
                $inicioFileName = 'RG_';
                $fileName = ProcessoCandidatoController::nomeArquivo($request, $inicioFileName, $arquivoType);


                $validarArquivo = ProcessoCandidatoController::validacoesArquivo($request, $arquivoType, $docDesc);
                if($validarArquivo !== '1'){
                    return $validarArquivo;
                }

                $upload = ProcessoCandidatoController::realizarUpload($request, $arquivoType, $pathDoc , $fileName, $docDesc);
                if($upload !== '1'){
                    return $upload;
                }
                //salvar caminho
                $profiles->caminho_rg = $pathDoc.$fileName;

            }else {
                rq::session()->flash('status-not', 'Documento de Identidade com Foto é obrigatório!');
                return redirect()
                    ->back()
                    ->with('error', 'Documento de Identidade com Foto é obrigatório!')
                    ->withInput();
            }

            //CPF
            if ($request->hasFile('caminho_cpf')){

                $docDesc = 'CPF';
                $pathDoc = ConstUtils::CAMINHO_ARQUIVO_CPF.'/';
                $arquivoType = 'caminho_cpf';
                $inicioFileName = 'CPF_';
                $fileName = ProcessoCandidatoController::nomeArquivo($request, $inicioFileName, $arquivoType);

                $validarArquivo = ProcessoCandidatoController::validacoesArquivo($request, $arquivoType, $docDesc);
                if($validarArquivo !== '1'){
                    return $validarArquivo;
                }

                $upload = ProcessoCandidatoController::realizarUpload($request, $arquivoType, $pathDoc , $fileName, $docDesc);
                if($upload !== '1'){
                    return $upload;
                }
                //salvar caminho
                $profiles->caminho_cpf = $pathDoc.$fileName;

            }else {
                rq::session()->flash('status-not', 'Documento CPF é obrigatório!');
                return redirect()
                    ->back()
                    ->with('error', 'Documento CPF é obrigatório!')
                    ->withInput();
            }

            //TITULO DE ELEITOR
            if ($request->hasFile('caminho_titulo')){

                $docDesc = 'Título de Eleitor';
                $pathDoc = ConstUtils::CAMINHO_ARQUIVO_TITULO.'/';
                $arquivoType = 'caminho_titulo';
                $inicioFileName = 'TITULO_';
                $fileName = ProcessoCandidatoController::nomeArquivo($request, $inicioFileName, $arquivoType);

                $validarArquivo = ProcessoCandidatoController::validacoesArquivo($request, $arquivoType, $docDesc);
                if($validarArquivo !== '1'){
                    return $validarArquivo;
                }

                $upload = ProcessoCandidatoController::realizarUpload($request, $arquivoType, $pathDoc , $fileName, $docDesc);
                if($upload !== '1'){
                    return $upload;
                }
                //salvar caminho
                $profiles->caminho_titulo = $pathDoc.$fileName;

            }else {
                rq::session()->flash('status-not', 'Documento Título de Eleitor é obrigatório!');
                return redirect()
                    ->back()
                    ->with('error', 'Documento Título de Eleitor é obrigatório!')
                    ->withInput();
            }

            //QUITAÇÃO ELEITORAL
            if ($request->hasFile('caminho_quitacao')){

                $docDesc = 'Quitação Eleitoral';
                $pathDoc = ConstUtils::CAMINHO_ARQUIVO_QUITACAO.'/';
                $arquivoType = 'caminho_quitacao';
                $inicioFileName = 'QUITACAO_';
                $fileName = ProcessoCandidatoController::nomeArquivo($request, $inicioFileName, $arquivoType);

                $validarArquivo = ProcessoCandidatoController::validacoesArquivo($request, $arquivoType, $docDesc);
                if($validarArquivo !== '1'){
                    return $validarArquivo;
                }

                $upload = ProcessoCandidatoController::realizarUpload($request, $arquivoType, $pathDoc , $fileName, $docDesc);
                if($upload !== '1'){
                    return $upload;
                }
                //salvar caminho
                $profiles->caminho_quitacao = $pathDoc.$fileName;

            }else {
                rq::session()->flash('status-not', 'Documento de Quitação Eleitoral é obrigatório!');
                return redirect()
                    ->back()
                    ->with('error', 'Documento de Quitação Eleitoral é obrigatório!')
                    ->withInput();
            }

            //PIS/PASEP
            if ($request->hasFile('caminho_pis')) {

                $docDesc = 'PIS/PASEP';
                $pathDoc = ConstUtils::CAMINHO_ARQUIVO_PIS.'/';
                $arquivoType = 'caminho_pis';
                $inicioFileName = 'PIS_';
                $fileName = ProcessoCandidatoController::nomeArquivo($request, $inicioFileName, $arquivoType);

                $validarArquivo = ProcessoCandidatoController::validacoesArquivo($request, $arquivoType, $docDesc);
                if($validarArquivo !== '1'){
                    return $validarArquivo;
                }

                $upload = ProcessoCandidatoController::realizarUpload($request, $arquivoType, $pathDoc , $fileName, $docDesc);
                if($upload !== '1'){
                    return $upload;
                }
                //salvar caminho
                $profiles->caminho_pis = $pathDoc.$fileName;

            }else {
                rq::session()->flash('status-not', 'Documento PIS/PASEP é obrigatório!');
                return redirect()
                    ->back()
                    ->with('error', 'Documento PIS/PASEP é obrigatório!')
                    ->withInput();
            }

            //RESERVISTA
            if ($request->hasFile('caminho_reservista')) {

                $docDesc = 'Certificado de Reservista';
                $pathDoc = ConstUtils::CAMINHO_ARQUIVO_RESERVISTA.'/';
                $arquivoType = 'caminho_reservista';
                $inicioFileName = 'RESERVISTA_';
                $fileName = ProcessoCandidatoController::nomeArquivo($request, $inicioFileName, $arquivoType);

                $validarArquivo = ProcessoCandidatoController::validacoesArquivo($request, $arquivoType, $docDesc);
                if($validarArquivo !== '1'){
                    return $validarArquivo;
                }

                $upload = ProcessoCandidatoController::realizarUpload($request, $arquivoType, $pathDoc , $fileName, $docDesc);
                if($upload !== '1'){
                    return $upload;
                }
                //salvar caminho
                $profiles->caminho_reservista = $pathDoc.$fileName;

            }

            //RESIDENCIA
            if ($request->hasFile('caminho_residencia')) {

                $docDesc = 'Comprovante de Residência';
                $pathDoc = ConstUtils::CAMINHO_ARQUIVO_RESIDENCIA.'/';
                $arquivoType = 'caminho_residencia';
                $inicioFileName = 'RESIDENCIA_';
                $fileName = ProcessoCandidatoController::nomeArquivo($request, $inicioFileName, $arquivoType);

                $validarArquivo = ProcessoCandidatoController::validacoesArquivo($request, $arquivoType, $docDesc);
                if($validarArquivo !== '1'){
                    return $validarArquivo;
                }

                $upload = ProcessoCandidatoController::realizarUpload($request, $arquivoType, $pathDoc , $fileName, $docDesc);
                if($upload !== '1'){
                    return $upload;
                }
                //salvar caminho
                $profiles->caminho_residencia = $pathDoc.$fileName;

            }else {
                rq::session()->flash('status-not', 'Documento Comprovante de Residência é obrigatório!');
                return redirect()
                    ->back()
                    ->with('error', 'Documento Comprovante de Residência é obrigatório!')
                    ->withInput();
            }

            //CERTIDÃO CASAMENTO
            if ($request->hasFile('caminho_certidao')) {

                $docDesc = 'Certidão de Casamento';
                $pathDoc = ConstUtils::CAMINHO_ARQUIVO_CERTIDAO.'/';
                $arquivoType = 'caminho_certidao';
                $inicioFileName = 'CERTIDAO_';
                $fileName = ProcessoCandidatoController::nomeArquivo($request, $inicioFileName, $arquivoType);

                $validarArquivo = ProcessoCandidatoController::validacoesArquivo($request, $arquivoType, $docDesc);
                if($validarArquivo !== '1'){
                    return $validarArquivo;
                }

                $upload = ProcessoCandidatoController::realizarUpload($request, $arquivoType, $pathDoc , $fileName, $docDesc);
                if($upload !== '1'){
                    return $upload;
                }
                //salvar caminho
                $profiles->caminho_certidao = $pathDoc.$fileName;
            }

            //ESCOLARIDADE
            if ($request->hasFile('caminho_escolaridade')) {

                $docDesc = 'Comprovante de Escolaridade';
                $pathDoc = ConstUtils::CAMINHO_ARQUIVO_ESCOLARIDADE.'/';
                $arquivoType = 'caminho_escolaridade';
                $inicioFileName = 'ESCOLARIDADE_';
                $fileName = ProcessoCandidatoController::nomeArquivo($request, $inicioFileName, $arquivoType);

                $validarArquivo = ProcessoCandidatoController::validacoesArquivo($request, $arquivoType, $docDesc);
                if($validarArquivo !== '1'){
                    return $validarArquivo;
                }

                $upload = ProcessoCandidatoController::realizarUpload($request, $arquivoType, $pathDoc , $fileName, $docDesc);
                if($upload !== '1'){
                    return $upload;
                }
                //salvar caminho
                $profiles->caminho_escolaridade = $pathDoc.$fileName;
            }else {
                rq::session()->flash('status-not', 'Documento de Escolaridade é obrigatório!');
                return redirect()
                    ->back()
                    ->with('error', 'Documento de Escolaridade é obrigatório!')
                    ->withInput();
            }

            //CURSO PROFISSIONALIZANTE
            if ($request->hasFile('caminho_curso')) {

                $docDesc = 'Curso Profissionalizante';
                $pathDoc = ConstUtils::CAMINHO_ARQUIVO_CURSO.'/';
                $arquivoType = 'caminho_curso';
                $inicioFileName = 'CURSO_';
                $fileName = ProcessoCandidatoController::nomeArquivo($request, $inicioFileName, $arquivoType);

                $validarArquivo = ProcessoCandidatoController::validacoesArquivo($request, $arquivoType, $docDesc);
                if($validarArquivo !== '1'){
                    return $validarArquivo;
                }

                $upload = ProcessoCandidatoController::realizarUpload($request, $arquivoType, $pathDoc , $fileName, $docDesc);
                if($upload !== '1'){
                    return $upload;
                }
                //salvar caminho
                $profiles->caminho_curso = $pathDoc.$fileName;
            }else {
                rq::session()->flash('status-not', 'Documento Curso Profissionalizante é obrigatório!');
                return redirect()
                    ->back()
                    ->with('error', 'Documento Curso Profissionalizante é obrigatório!')
                    ->withInput();
            }

            //REGISTRO DO CONSELHO
            if ($request->hasFile('caminho_registro')) {

                $docDesc = 'Registro no Conselho';
                $pathDoc = ConstUtils::CAMINHO_ARQUIVO_REGISTRO.'/';
                $arquivoType = 'caminho_registro';
                $inicioFileName = 'CONSELHO_';
                $fileName = ProcessoCandidatoController::nomeArquivo($request, $inicioFileName, $arquivoType);

                $validarArquivo = ProcessoCandidatoController::validacoesArquivo($request, $arquivoType, $docDesc);
                if($validarArquivo !== '1'){
                    return $validarArquivo;
                }

                $upload = ProcessoCandidatoController::realizarUpload($request, $arquivoType, $pathDoc , $fileName, $docDesc);
                if($upload !== '1'){
                    return $upload;
                }
                //salvar caminho
                $profiles->caminho_registro = $pathDoc.$fileName;
            }else {
                rq::session()->flash('status-not', 'Documento Registro no Conselho é obrigatório!');
                return redirect()
                    ->back()
                    ->with('error', 'Documento Registro no Conselho é obrigatório!')
                    ->withInput();
            }

            //BANCO
            if ($request->hasFile('caminho_banco')) {

                $docDesc = 'Dados Bancários';
                $pathDoc = ConstUtils::CAMINHO_ARQUIVO_BANCO.'/';
                $arquivoType = 'caminho_banco';
                $inicioFileName = 'BANCO_';
                $fileName = ProcessoCandidatoController::nomeArquivo($request, $inicioFileName, $arquivoType);

                $validarArquivo = ProcessoCandidatoController::validacoesArquivo($request, $arquivoType, $docDesc);
                if($validarArquivo !== '1'){
                    return $validarArquivo;
                }

                $upload = ProcessoCandidatoController::realizarUpload($request, $arquivoType, $pathDoc , $fileName, $docDesc);
                if($upload !== '1'){
                    return $upload;
                }
                //salvar caminho
                $profiles->caminho_banco = $pathDoc.$fileName;
            }

            /********** FIM DOCUMENTAÇÃO **********/


            $saveProfile = $profiles->save();

            if($saveProfile){
                DB::commit();
                rq::session()->flash('status', 'Salvo com sucesso');

            }else{
                DB::rollback();
                rq::session()->flash('status-not', 'Operação não realizada! Ocorreu um erro ao salvar os dados.');
            }

            return redirect()
                ->back();

        }catch (Exception $e){
            DB::rollback();
            rq::session()->flash('status-not', 'Operação não realizada! '.$e->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Ocorreu um erro ao salvar.Tente enviar Novamente!')
                ->withInput();
        }
    }


    /******* FAZER VALIDAÇÕES PARA O ARQUIVO UPLOAD ********/

    //concentrar todas as validações necessárias ao arquivo
    public function validacoesArquivo($request, $arquivoType, $docDesc){

        $verificarTamanho = ProcessoCandidatoController::tamanhoArquivoValido($request, $arquivoType, $docDesc);
        if($verificarTamanho !== '1'){
            return $verificarTamanho;
        }

        $extensaoArquivo = ProcessoCandidatoController::extensaoArquivo($request, $arquivoType);

        $verificarTipoDoc = ProcessoCandidatoController::tipoDocumentoValido($docDesc, $extensaoArquivo);
        if($verificarTipoDoc !== '1'){
            return $verificarTipoDoc;
        }

        return '1';
    }

    //verificar se o tamanho do arquivo é válido conforme especificado
    public function tamanhoArquivoValido($request, $arquivotype, $docDesc){
        $url = $request->file($arquivotype);
        $size = $url->getClientSize(); //recupera seu tamanho

        if ($size > ConstUtils::TAMANHO_ARQUIVO){
            rq::session()->flash('status-not', 'Documento '.$docDesc.' ultrapassou o tamanho máximo de 5MB!');
            return redirect()
                ->back()
                ->with('error','Documento '.$docDesc.' ultrapassou o tamanho máximo de 5MB!')
                ->withInput();
        }
        return '1';
    }

    //retornar extensao do Arquivo
    public function extensaoArquivo($request, $arquivotype){

        $url = $request->file($arquivotype);
        $extensaoArquivo = $url->extension(); //recupera sua extensão

        return $extensaoArquivo;
    }

    //verifica se o tipo de doc é válido, de acordo com sua extensão
    public function tipoDocumentoValido($docDesc, $extensaoArquivo){

        if (strtoupper($extensaoArquivo) != 'PDF' && strtoupper($extensaoArquivo) != 'DOC'
            && strtoupper($extensaoArquivo) != 'DOCX' && strtoupper($extensaoArquivo) != 'JPEG'
            && strtoupper($extensaoArquivo) != 'JPG'){

            rq::session()->flash('status-not', 'Documento '.$docDesc. ' não possui a extensão permitida PDF,DOCX,DOC ou JPEG!');
            return redirect()
                ->back()
                ->with('error','Documento '.$docDesc.' não possui a extensão permitida PDF,DOCX,DOC ou JPEG!')
                ->withInput();
        }

        return '1';
    }

    //retorna o nome do arquivo para upload
    public function nomeArquivo($request, $inicioFileName, $arquivoType){

        $extensaoArquivo = ProcessoCandidatoController::extensaoArquivo($request, $arquivoType);

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

        //Exemplo $profile->caminho_rg = ConstUtils::CAMINHO_ARQUIVO_RG.'/'.$fileName_rg;
        return '1';
    }
    /******* FIM FAZER VALIDAÇÕES PARA O ARQUIVO UPLOAD ********/


    ///validação arquivos experiencia
    public function validacoesExperiencia($request, $docDesc, $arquivoType )
    {
            $url_experiencia = $request->file($arquivoType);
            $size_experiencia = $url_experiencia->getClientSize(); //recupera seu tamanho
            $extensaoArquivo_experiencia = $url_experiencia->extension(); //recupera sua extensão

            if ($size_experiencia > ConstUtils::TAMANHO_ARQUIVO) {
                rq::session()->flash('status-not', 'Documento Da sua ' . $docDesc . ' ultrapassou o tamanho máximo de 5MB!');
                return redirect()
                    ->back()
                    ->with('error', 'Documento Da sua ' . $docDesc . ' ultrapassou o tamanho máximo de 5MB!')
                    ->withInput();
            }

            if (strtoupper($extensaoArquivo_experiencia) != 'PDF' && strtoupper($extensaoArquivo_experiencia) != 'DOC'
                && strtoupper($extensaoArquivo_experiencia) != 'DOCX' && strtoupper($extensaoArquivo_experiencia) != 'JPEG'
                && strtoupper($extensaoArquivo_experiencia) != 'JPG') {
                rq::session()->flash('status-not', 'Documento de ' . $docDesc . ' não possui a extensão permitida PDF,DOCX,DOC ou JPEG!');
                return redirect()
                    ->back()
                    ->with('error', 'Documento de ' . $docDesc . ' não possui a extensão permitida PDF,DOCX,DOC ou JPEG!')
                    ->withInput();
            }

            return '1';
    }

    public function salvarArquivoExperiencia($request, $arquivotype){

        if($arquivotype == 'caminho_experiencia_1'){
            $experienciadesc = 'Experiência 1';
            $inicioFileName = 'EXPERIENCIA_1_';
            $inicioCaminho = ConstUtils::CAMINHO_ARQUIVO_EXPERIENCIA_1;

        }elseif($arquivotype == 'caminho_experiencia_2'){
            $experienciadesc = 'Experiência 2';
            $inicioFileName = 'EXPERIENCIA_2_';
            $inicioCaminho = ConstUtils::CAMINHO_ARQUIVO_EXPERIENCIA_2;

        }elseif($arquivotype == 'caminho_experiencia_3'){
            $experienciadesc = 'Experiência 3';
            $inicioFileName = 'EXPERIENCIA_3_';
            $inicioCaminho = ConstUtils::CAMINHO_ARQUIVO_EXPERIENCIA_3;

        }else{
            /*$experienciadesc = 'Experiência';
            $inicioFileName = 'EXPERIENCIA_';*/
            return '0';
        }

        //arquivo EXPERIENCIA
        if ($request->hasFile($arquivotype)){
           /* $url_experiencia = $request->file($arquivotype);
            $size_experiencia = $url_experiencia->getClientSize(); //recupera seu tamanho
            $extensaoArquivo_experiencia = $url_experiencia->extension(); //recupera sua extensão*/

            /*if ($size_experiencia > ConstUtils::TAMANHO_ARQUIVO){
                rq::session()->flash('status-not', 'Documento Da sua '.$experienciadesc.' ultrapassou o tamanho máximo de 5MB!');
                return redirect()
                    ->back()
                    ->with('error','Documento Da sua '.$experienciadesc.' ultrapassou o tamanho máximo de 5MB!')
                    ->withInput();
            }*/

           /* if (strtoupper($extensaoArquivo_experiencia) != 'PDF' && strtoupper($extensaoArquivo_experiencia) != 'DOC'
                && strtoupper($extensaoArquivo_experiencia) != 'DOCX' && strtoupper($extensaoArquivo_experiencia) != 'JPEG'
                && strtoupper($extensaoArquivo_experiencia) != 'JPG'){
                rq::session()->flash('status-not', 'Documento de '.$experienciadesc.' não possui a extensão permitida PDF,DOCX,DOC ou JPEG!');
                return redirect()
                    ->back()
                    ->with('error','Documento de '.$experienciadesc.' não possui a extensão permitida PDF,DOCX,DOC ou JPEG!')
                    ->withInput();
            }*/

            /*$fileName_experiencia = $inicioFileName.Globals::limpaCPF_CNPJ($request->cpf).'_'.date('dmYhms').".".$extensaoArquivo_experiencia;

            $path_experiencia = $inicioCaminho.'/';
            $url_experiencia->storeAs($path_experiencia,$fileName_experiencia,'public');
            if(!$url_experiencia){ //se não seu certo o upload
                rq::session()->flash('status-not', 'Falha ao salvar o arquivo Da sua '.$experienciadesc.'. Tente novamente!');
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            }else{
                return $inicioCaminho.'/'.$fileName_experiencia;
            }*/


        }
    }

}
