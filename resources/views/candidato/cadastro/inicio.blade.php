@extends('layouts.template')

@section('content')

    <div class="row justify-content-center">

       {{-- <form action="{{ route ('candidato.create') }}" method="get">--}}
        {{--<form action="{{ action('CandidatoController@createCadastro') }}" method="post">--}}
        <form action="{{ action('CandidatoController@createCadastro') }}" method="get">

            {{--{{ csrf_field() }}--}}

            @include('messages.alert')

            <div class="card-header text-center">
                <h5 style="color: black">Área de Cadastro Do(a) Candidato(a) </h5>
            </div>

            <div class="alert-info col-sm-12 col-md-12 col-lg-12" style="margin-top:20px;padding:5px;
                 padding-right:20px;border-radius: 5px;margin-bottom: 20px; ">
                <ul style="list-style: none;">
                    <li class="text-center">Informe o seu CPF para continuar</li>
                </ul>
            </div>


            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                <input type="text" class="form-control cpf" id="cpf" name="cpf"  placeholder="CPF" required>
            </div>

            <div class="form-group col-sm-12 col-md-12 col-lg-12" style="margin-top: 15px">
                <div class="text-center">
                    <button type="submit" class="btn btn-success col-md-12"> Enviar </button>
                </div>
            </div>

            <a href="{{url('/')}}">Retornar ao login</a>

        </form>

    </div>

@endsection
