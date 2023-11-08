@extends('master2L')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@auth
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
            @csrf
        </form>
    @else
<section id="login">
        <div class="container">
            <div class="form-box">
                <div class="brand-box">
                    <a href="#" class="">
                        <img class="brand" src="/assets/img/logo/logo1.png" alt="">
                    </a>
                </div>
                    <h4>Welcome to ARTI Formation! 👋</h4>
        <form action="{{ route('login.authenticate') }}" method="POST" class="login">
            @csrf
            <div class="input-group">
                <div class="input-field">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required/>
                </div>
                <div class="input-field">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" class="form-control" id="myInput" name="password" placeholder="password" required/>
                    <span class="eye" onclick="myfunction()">
                        <i class="fa-solid fa-eye"  id="hide1"></i>
                        <i class="fa-solid fa-eye-slash"  id="hide2"></i>
                    </span>
                </div>
                </div>
                <div class="btn">
                    <button class="blue" type="submit">se connecter</button>
                </div>
        </form>
        </div>
            </div>
    @endif
        </section>
    <script>
        function myfunction() {
    var x = document.getElementById("myInput");
    var y = document.getElementById("hide1");
    var z = document.getElementById("hide2");

    if (x.type === 'password') {
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
    } else {
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
    }
}
//         function eye(){
//       const togglePassword = document.getElementById("togglePassword");
//       const password = document.getElementById("password");

//     const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
//     password.setAttribute('type', type);
//     this.classList.toggle('<span class="fa-solid fa-eye" id="togglePassword"></span>');
// };
    </script>

@endsection

