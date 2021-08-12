<nav class="navbar navbar-expand-lg navbar-light bg-light">
    {{--<a class="navbar-brand" href="#">Navbar</a>--}}


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                {{--<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
                <a title="Páginal Inicial" class="nav-link"
                   href="{{action('HomeController@index')}}">Home</a>
            </li>
            {{--<li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>--}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Área do Candidato
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{action('CandidatoDadosController@index')}}">Dados</a>
                    <a class="dropdown-item" href="{{action('InscricaoCandidatoController@index')}}">Inscrição Processo Seletivo</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Operações
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Avaliações</a>
                    {{--<a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>--}}
                </div>
            </li>
           {{-- <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>--}}
        </ul>
            {{--<form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>--}}

        <ul class="nav navbar-nav navbar-right">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="{{url('alterarsenha')}}">Alterar senha</a>

                    <a class="dropdown-item" href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">Sair
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </div>
            </li>
        </ul>


    </div>
</nav>
