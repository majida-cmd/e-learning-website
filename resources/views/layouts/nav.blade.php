<nav>
    <a href="{{ url('/') }}"><img src="/assets/img/logo/logo1.png" alt=""></a>
    <div class="navigation">
        <ul>


            @auth
                @if (Auth::user()->isEtudiant())
                @php
                $hashids = new Hashids\Hashids('arti_form', 15);
                $encryptedId = $hashids->encode($etudiant->id_utilisateur);
            @endphp
                <li><a class="active" href="{{ route('etudiant.index2', ['id' => $encryptedId]) }}">Accueil</a>
                <li><a href="{{ route('etudiant.profile', ['id' => $encryptedId]) }}" >Profile</a></li>
                @elseif (Auth::user()->isAdmin())
                    <li><a href="{{ route('etudiants.index') }}" >Gestion</a></li>
                @endif
                <li>
                    <form action="{{ route('logout') }}" method="GET" id="logout-form">
                        @csrf
                        <a href="javascript:void(0)"  onclick="document.getElementById('logout-form').submit()">
                            Déconnexion
                        </a>
                    </form>
                </li>
            @else
            <i id="menu-close" class="fas fa-times"></i>
                <li><a href="{{ url('/') }}"  class="active">Accueil</a></li>
                <li><a href="{{ url('/domaines') }}">Domaines</a></li>
                <li><a href="{{ url('/contactForm') }}">contact</a></li>
                <li><a href="{{ url('/login') }}">Connexion</a></li>
            @endauth
        </ul>
        <img src="/assets/img/logo/menu.png" id="menu-button" alt="">
    </div>
</nav>
