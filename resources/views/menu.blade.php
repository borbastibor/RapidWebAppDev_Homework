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
                        <li><a class="dropdown-item text-dark" href="#">Felhasználók</a></li>
                        <li><a class="dropdown-item text-dark" href="#">Üzenetek</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</nav>