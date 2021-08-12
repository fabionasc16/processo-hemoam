@extends('layouts.template-inscricao')

@section('content')

    <div class="container">

        <form id="form-processo" action="{{action('InscricaoCandidatoController@prosseguirParaPNE')}}" method="get">
            {{--{{ csrf_field() }}--}}


        <div class="mui-panel">

            <div class="col-md page-header">
                <h2 class="page-header-title text-center">Inscrição Processo Seletivo</h2>
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
                <div id="circulo" class="text-center inline" style="padding-top: 5px">2</div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circle-disabled" class="text-center inline" style="padding-top: 5px">3</div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circle-disabled" class="text-center inline" style="padding-top: 5px">4</div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circle-disabled" class="text-center inline" style="padding-top: 5px">FIM</div>
            </div>
            <br>
            <br>

            @include('candidato.inscricao.dados_opcao')


            <!-- <div class="row" style="margin-top: 20px;"> -->
            <div class="form-row" style="margin-top: 5px;">
                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                    <button class="btn btn-primary" type="submit">Prosseguir</button>
                    <a class="btn btn-default" href="{{action('HomeController@index') }}">Sair</a>
                </div>
            </div>
            <!-- </div> -->


        </div> <!--fim mui-panel-->




           {{-- </form>--}}
    </div> {{--fim container--}}


@endsection
