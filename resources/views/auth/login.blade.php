@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 30px">


                <div class="card-header text-center">
                    <h5 style="color: black">PÁGINA DE INSCRIÇÃO </h5>
                   {{-- / <h5 style="color: black">PÁGINA DE ATUALIZAÇÃO DE DADOS CADASTRAIS</h5>--}}
                </div>

                <div class="card-body">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf


                            <div class="form-group row">
                                <label for="cpf" class="col-md-4 col-form-label text-md-right">CPF</label>

                                <div class="col-md-6">
                                    <input id="cpf" type="cpf" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>

                                    @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary col-md-6">Login</button>
                                <br><br>
                                <a href="{{action('CandidatoController@index')}}">Não tenho cadastro</a>
                            </div>

                           {{-- <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                   --}}{{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif--}}{{--
                                </div>
                            </div>--}}
                        </form>

                </div>
                </div>

        </div>
    </div>
@endsection
