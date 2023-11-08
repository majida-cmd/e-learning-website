<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="Ie=edge">

        <link rel="icon" href="/assets/img/logo/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="/assets/css/styleL.css">
        <link rel="stylesheet" href="/assets/css/style.css">


        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="/assets/js/script.js"></script>
        <script defer src="/assets/js/app.js"></script>

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Arvo&display=swap');
        </style>
</head>
<body>
        @include('layouts.navL')
        @yield('content')
        @include('layouts.footer')
@csrf
<script>
                $('#menu-button').click(function(){
                        $('nav .navigation ul').addClass('active')
                });
                $('#menu-close').click(function(){
                        $('nav .navigation ul').removeClass('active')
                });
            </script>
</body>
</html>
