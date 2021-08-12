<header id="header" class="mui-appbar mui--z1">
    <div class="mui-appbar mui--appbar-line-height">
        <div class="mui-container-fluid">
            <table>
                <tr class="mui--appbar-height">
                    {{--@guest

                    @else
                        <td class = "drawer">
                            <img class="sidedrawer-toggle js-show-sidedrawer logo" src="/icon/menu.svg" height="25" width="25" style="margin-right: 15px;"/>
                        </td>
                    @endguest--}}
                    <td>
                        <a class="logo" href="{{url('/home') }}">
                            <img class="img-responsive " src="{{asset('img/BrasaoGoverno.png')}}">
                            <span style="color: #fff; font: 20px roboto, sans-serif; margin-left: 15px; vertical-align: middle;">
                                @yield('title')
                            </span>
                        </a>
                    </td>

                    <td class="mui--text-right">
                        <ul class="mui-list--inline mui--text-body2">
                            <!-- Authentication Links -->
                            @guest

                            @else
                                <li class="mui-dropdown">
                                    <a href="#" class="dropdown-toggle" data-mui-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" style="color:#10629e">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="mui-dropdown__menu mui-dropdown__menu--right">
                                        <li>



                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();" style="color:#10629e">
                                                Sair
                                            </a>


                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</header>

