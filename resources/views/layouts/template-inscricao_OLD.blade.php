<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">

</head>
<body>

    @guest

    @else
        <div id="sidedrawer" class="mui--no-user-select">
            <ul>
                <div class="drawertitle">Processo Seletivo</div>


            </ul>
            @endguest
        </div>

        @include('layouts.template-header')

        <div class="container">
        @yield('content')
        </div>

        <br>
        <div class="rodape" style="margin-top: 20px;">
            @include('layouts.default.footer')
        </div>


        @include('layouts.default.adicionajs')

</body>
</html>
