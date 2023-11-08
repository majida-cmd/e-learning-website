<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item d-sm-inline-block">
        <a href="{{ route('domaine.index') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item  d-sm-inline-block">
        <form action="{{ route('logout') }}" method="GET" id="logout-form">
            @csrf
            <a href="javascript:void(0)" class="nav-link" onclick="document.getElementById('logout-form').submit()">
                Déconnexion
            </a>
        </form>
      </li>
    </ul>
  </nav>

