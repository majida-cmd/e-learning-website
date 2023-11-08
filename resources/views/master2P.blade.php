<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assetsP/css/styleP2.css">
    <link rel="stylesheet" href="/assetsP/css/stylep.css">
    <script src="/assetsP/js/script.js"></script>
</head>

<body>
    @include('layouts.navP')
    @yield('content')
    @include('layouts.footerp')
    @csrf
    <script>
        $('#menu-button').click(function() {
            $('nav .navigation ul').addClass('active')
        });
        $('#menu-close').click(function() {
            $('nav .navigation ul').removeClass('active')
        });
    </script>
</body>

</html>
