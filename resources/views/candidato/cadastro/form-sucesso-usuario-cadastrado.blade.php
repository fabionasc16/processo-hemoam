@extends('layouts.template-inscricao')

@section('content')

    <div class="container" style="margin-top: 40px;">

        <div class="mui-panel">


            <div class="text-center" style="margin-top: 50px;">
                <img src="{{asset('img/check.jpg')}}" height="60" width="60">
            </div>


            <div class="col-md page-header" style="margin-top: -15px">
                <h2 class="page-header-title text-center" style="color: green">

                    Sucesso</h2>
            </div>

            <div class="alert-success mui-recomendacao" style="padding: 8px;border-radius: 5px;">
                <b>Seu cadastro foi realizado com sucesso!</b>
            </div>

            <br>

            <div class="col-md page-header" style="margin-top: -15px">
                <h2 class="page-header-title text-center" style="color: #9b7a44">

                    Alerta!!</h2>
            </div>

            <div class="alert-warning mui-recomendacao" style="padding: 8px;border-radius: 5px;">
                <b>Seu CPF já estava associado a um e-mail e a uma senha!</b>
                <br>
                Por motivos de segurança, o e-mail e a senha cadastrados nesse momento não serão
                utilizados.
                <br>
                Considere utilizar o e-mail e a senha que já estavam cadastrados no sistema.
            </div>

            <br>

            <div class="text-center">
                <a href="{{route('login')}}">Retornar a tela de login</a>
            </div>

        </div>

    </div> {{--fim container--}}

@endsection
