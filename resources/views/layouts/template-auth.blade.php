<!DOCTYPE html>
<html lang="pt-br">

<head>
  <script src="{{asset('js/app.js')}}"></script>
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PROCESSO SELETIVO</title>

   {{-- @include('layouts.default.adicionacss')
    @include('layouts.default.adicionajs')
--}}
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">

    @yield('dependencias')
</head>

<body>
 {{-- <div class="container" style="background-color:#FFFFF0" >--}}
  <div class="container" style="background-color:white" >
    <div class="row">

        <div style="margin-bottom: 50px">
            @include('layouts.default.cabecalho')
    	@auth
		    @include('layouts.default.menu')
        @endauth
        </div>
    </div>

      <div>
          {{--<div class="row" style="margin-top: -21px">
              @auth
                  @yield('navbar')
              @endauth
          </div>--}}

           <div class="row" {{--style="margin-top: 18px"--}}>
                  <div class="col-12" style="margin-bottom: 100px">
                      @yield('content')
                     {{-- @auth
                        @yield('content')
                      @else
                          @include('desconectado')
                      @endauth--}}
                  </div>
            </div>
      </div>
  </div>

 @include('layouts.default.adicionajs')
</body>

</html>
