@extends('layouts.template-inscricao')

@section('content')

    <div class="container">

       {{-- <form id="form-processo" action="{{action('ProcessoCandidatoController@store')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}--}}


        <div class="mui-panel">

            <div class="col-md page-header">
                <h2 class="page-header-title text-center">Inscrição Processo Seletivo</h2>
            </div>

            <div class="alert-info mui-recomendacao" style="padding: 8px;border-radius: 5px;">
                <b>Bem vindo(a), por favor atente para as seguintes recomendações:</b>
                <ul>
                    <li>Os campos preenchidos de forma equivocada serão mostrados com um alerta.</li>
                    <li>Os campos com '<b>*</b>' são de preenchimento <b>OBRIGATÓRIO</b>.</li>
                    <li>O nome deve ser completo conforme documento.</li>
                    <li>Os arquivos podem ser do tipo <b>PDF, JPEG (imagem)</b> ou <b>DOCX (Word)</b>.</li>
                    <li>O tamanho máximo de cada arquivo <b>NÃO</b> pode ultrapassar 5MB.</li>
                </ul>
            </div>
            <br>

            @include('messages.alert')

            <br>

            {{--@yield('conteudo')--}}

            <div class="inline">
                <div id="passos" class="text-center inline"><b>Passos</b></div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circulo" class="text-center inline" style="padding-top: 5px">1</div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circle-disabled" class="text-center inline" style="padding-top: 5px">2</div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circle-disabled" class="text-center inline" style="padding-top: 5px">3</div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circle-disabled" class="text-center inline" style="padding-top: 5px">4</div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circle-disabled" class="text-center inline" style="padding-top: 5px">FIM</div>
            </div>
            <br>
            <br>

            @include('candidato.inscricao.dados_pessoais')


            <!-- <div class="row" style="margin-top: 5px;"> -->
            <div class="form-row" style="margin-top: 5px;">
                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                    {{-- <button class="btn btn-primary" type="submit">Prosseguir</button>--}}
                    <a class="btn btn-primary" href="{{action('InscricaoCandidatoController@prosseguirParaPasso2') }}">Prosseguir</a>
                    <a class="btn btn-default" href="{{action('HomeController@index') }}">Sair</a>
                </div>
            </div>
            <!-- </div> -->


        </div> <!--fim mui-panel-->




           {{-- </form>--}}
    </div> {{--fim container--}}


@endsection
