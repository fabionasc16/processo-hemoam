@extends('layouts.template')

@section('content')

    <div class="row justify-content-center">

        <form action="{{ route ('processo-candidato.create') }}" method="get">
            {{--<form action="{{ route ('tela.processo') }}" method="post">--}}
            {{--{{ csrf_field() }}--}}

            <div class="alert-info col-sm-12 col-md-12 col-lg-12" style="margin-top:20px;padding:5px;
                 padding-right:20px;border-radius: 5px;margin-bottom: 20px">
                <ul>
                    <li>Selecione o processo e informe o seu CPF.</li>
                    <li><b><a href="{{url('requisitos') }}" target="_blank">Clique aqui</a></b> para ler os pré-requisitos</li>
                </ul>
            </div>

            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                <label for="cargo_processo">Processo Seletivo</label>
                <select  class="form-control" name="cargo_processo" id="cargo_processo" required
                         style="width: 100%">
                    <option value=""selected>-- Selecione --</option>
                     @foreach ($cargo as $C)
                         <option value="{{$C->id}}">{{$C->name}}</option>
                     @endforeach
                </select>
            </div>

            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                <input type="text" class="form-control" id="cpf" name="cpf"  placeholder="CPF" required>
            </div>

            <div class="form-group col-sm-12 col-md-12 col-lg-12" style="margin-top: 15px">
                <div class="text-center">
                    <button type="submit" class="btn btn-success col-md-12"> Cadastrar</button>
                </div>
            </div>

            <a href="{{url('admin/login')}}">Possui login?</a>

        </form>

    </div>

@endsection
