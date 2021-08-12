@extends('layouts.template-auth')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               {{-- <div class="card-header">Dashboard</div>--}}


                    <div class="card-header font-weight-bold text-center">
                        Bem-vindo(a) {{ Auth::user()->name }}
                    </div>
              {{--  <div class="card-body">
                   --}}{{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif--}}{{--

                </div>--}}
            </div>
        </div>
    </div>
</div>
@endsection
