<nav class="navbar navbar-danger bg-danger navbar-expand-lg shadow-sm p-1 font-weight-bold">
    <div class="collapse navbar-collapse" id="main_nav">
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link text-white" href="{{ url('/home') }}">Kezdőlap</a> </li>
            <li class="nav-item"> <a class="nav-link text-white" href="{{ url('/about') }}">Rólunk</a></li>
            <li class="nav-item"> <a class="nav-link text-white" href="{{ url('/supporter') }}">Támogatóink</a> </li>
            <li class="nav-item"> <a class="nav-link text-white" href="{{ url('/contact') }}">Kapcsolat</a></li>
            <li class="nav-item"> <a class="nav-link text-white" href="{{ url('/gallery') }}">Galéria</a></li>
            @if (Auth::user() && Auth::user()->is_admin())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" data-toggle="dropdown">Admin</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-dark" href="{{ url('users') }}">Felhasználók</a></li>
                        <li><a class="dropdown-item text-dark" href="{{ url('messages') }}">Üzenetek</a></li>
                        <li><a class="dropdown-item text-dark" href="{{ url('files') }}">Fájlok</a></li>
                    </ul>
                </li>
            @endif
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link text-white font-weight-bold" href="{{ route('login') }}">{{ __('Bejelentkezés') }}</a>
                    </li>
                @endif
                
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-white font-weight-bold" href="{{ route('register') }}">{{ __('Regisztráció') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>