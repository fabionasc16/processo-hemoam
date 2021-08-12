@extends('layouts.template-auth')

@section('content')

    <div class="container" {{--style="margin-top: 40px;"--}}>

        <h3 style="color: #0f6674">Dados Candidato</h3>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label>Nome</label>
                <input type="text" class="form-control" value="{{$candidato->nome}}" disabled>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label>Email</label>
                <input type="text" class="form-control"  value="{{$useremail}}" disabled>
                <small>ões serão enviadas para esse email</small>
            </div>
        </div>

        <!-- <div class="row" > -->
            <div class="form-row" style="margin-top: 20px;">
                <div class="form-group col-sm-8 col-md-8 col-lg-8">
                    <a class="btn btn-default" href="{{url('/home') }}">Voltar</a>
                </div>
            </div>
        <!-- </div> -->

    </div> {{--fim container--}}



@endsection
