@extends('layouts.template-inscricao')

@section('content')

    <div class="container" style="margin-top: 40px;">

        <form id="form-processo" action="{{action('CandidatoController@store')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}


        <div class="mui-panel">

            <div class="col-md page-header">
                <h2 class="page-header-title text-center">Cadastro</h2>
            </div>

            <div class="alert-info mui-recomendacao" style="padding: 8px;border-radius: 5px;">
                <b>Bem vindo(a), por favor atente-se para as seguintes recomendações:</b>
                <ul>
                    <li>Os campos preenchidos de forma equivocada serão mostrados com um alerta.</li>
                    <li>Os campos com '<b>*</b>' são de preenchimento OBRIGATÓRIO.</li>
                    <li>O <b>nome</b> deve ser completo conforme documento.</li>
                    <li> O(a) candidato(a) <b>NÃO</b> poderá utilizar abreviaturas quanto ao nome,
                        data de nascimento e localidades de nascimento e residência.</li>
                </ul>
            </div>
            <br>

            @include('messages.alert')

            <br>

            @include('candidato.cadastro.dados_pessoais')
            @include('candidato.cadastro.dados_login')

        </div> <!--fim mui-panel-->


            <div class="row" style="margin-top: 20px;">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                            <a class="btn btn-default" href="{{url('/candidato') }}">Cancelar</a>
                        </div>
                    </div>
            </div>


            </form>
    </div> {{--fim container--}}

@endsection
