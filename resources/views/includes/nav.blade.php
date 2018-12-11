<!-- Topbar -->
<nav class="topbar topbar-inverse topbar-expand-md topbar-sticky">
    <div class="container">

        <div class="topbar-left">
            <button class="topbar-toggler">&#9776;</button>
            <a class="topbar-brand" href="">
                <img class="logo-default" src="{{ asset('img/logo.png') }}" alt="logo">
                <img class="logo-inverse" src="{{ asset('img/logo-light.png') }}" alt="logo">
            </a>
        </div>


        <div class="topbar-right">
            <ul class="topbar-nav nav">
                <li class="nav-item"><a class="nav-link" href="">Home</a></li>
                @guest
                <li class="nav-item"><a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">Login</a></li>
                @endguest
                @auth
                <li class="nav-item">Hey {{ auth()->user()->name }}</li>
                @endauth
            </ul>
        </div>

    </div>
</nav>
<!-- END Topbar -->