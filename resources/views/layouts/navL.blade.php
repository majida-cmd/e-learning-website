<nav>
    <img src="/assets/img/logo/logo1.png" alt="">
    <div class="navigation">
        <ul>
            <i id="menu-close" class="fas fa-times"></i>
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="{{ url('/domaines') }}">Domaines</a></li>
            <li><a href="{{ url('/contactForm') }}">contact</a></li>
            <li><a href="{{ url('/login') }}" class="activ">Connexion</a></li>
            @auth
                <li>
                    <form action="{{ route('logout') }}" method="GET" id="logout-form">
                        @csrf
                        <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit()">
                            Logout
                        </a>
                    </form>
                </li>
            @endauth
        </ul>
        <img src="/assets/img/logo/menu.png" id="menu-button" alt="">
    </div>
</nav>
