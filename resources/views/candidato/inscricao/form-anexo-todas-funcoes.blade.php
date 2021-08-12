@extends('layouts.template-inscricao')

@section('content')

    <div class="container">

        <form id="form-processo" action="{{action('ProcessoCandidatoController@store')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}


        <div class="mui-panel">

            <div class="col-md page-header">
                <h2 class="page-header-title text-center">Inscrição Processo Seletivo</h2>
            </div>

            <div class="alert-info mui-recomendacao" style="padding: 8px;border-radius: 5px;">
                <ul>
                    <li>Os arquivos devem ser digitalizados em formato <b>PDF</b>.</li>
                    <li>O tamanho máximo de cada arquivo <b>NÃO</b> pode ultrapassar 5MB.</li>
                    <li>Download <a target="_blank" href="http://consultacadastral.inss.gov.br/Esocial">Comprovante de Regularidade no E-Social</a></li>
               </ul>
            </div>

            <br>

            @include('messages.alert')

            <br>

            {{--@yield('conteudo')--}}

            <div class="inline">
                <div id="passos" class="text-center inline"><b>Passos</b></div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circle-disabled" class="text-center inline" style="padding-top: 5px">1</div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circle-disabled" class="text-center inline" style="padding-top: 5px">2</div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circle-disabled" class="text-center inline" style="padding-top: 5px">3</div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circulo" class="text-center inline" style="padding-top: 5px">4</div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circle-disabled" class="text-center inline" style="padding-top: 5px">FIM</div>
            </div>
            <br>
            <br>


            @include('candidato.inscricao.anexo_todas_funcoes')

            @if($nivelid == '1')
                @include('candidato.inscricao.anexo_nivel_superior')
            @elseif($nivelid == '2')
                @include('candidato.inscricao.anexo_nivel_medio_tecnico')
            @elseif($nivelid == '3')
                @include('candidato.inscricao.anexo_nivel_medio')
            @elseif($nivelid == '4')
                @include('candidato.inscricao.anexo_nivel_fundamental')
            @elseif($nivelid == 'FIM')
                @include('candidato.inscricao.inscricao_sucesso')
            @endif

            <!-- <div class="row" style="margin-top: 20px;"> -->
            <div class="form-row" style="margin-top: 5px;">
                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                    <button class="btn btn-primary" type="submit">Prosseguir</button>
                    <a class="btn-primary" href="{{action('HomeController@index') }}">Sair</a>
                </div>
            </div>
            <!-- </div> -->


        </div> <!--fim mui-panel-->




            </form>
    </div> {{--fim container--}}

@include('candidato.inscricao.script_anexo')

@endsection
