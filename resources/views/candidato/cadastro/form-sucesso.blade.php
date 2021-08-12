@extends('layouts.template-inscricao')

@section('content')

    <div class="container" style="margin-top: 40px;">

        <div class="mui-panel">

          {{--  <div class="text-center">
                <img class="img-responsive " src="{{asset('img/check.jpg')}}" height="25" width="25" style="margin-right: 15px;">
            </div>--}}
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

            <div class="text-center">
                <a href="{{route('login')}}">Retornar a tela de login</a>
            </div>

        </div>

    </div> {{--fim container--}}

@endsection
