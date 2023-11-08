<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Confirmation de votre compte</title>
</head>
<body>
    <img src="{{ asset('assets/img/logo/logo1.png') }}" alt="logo">
    <h1>Bienvenu</h1>
    <h3>Confirmation de votre compte</h3>
    <h3> {{ $nom }} </h3>
    <a href="{{$href}}" class="btn btn-primary">Confirmation de votre compte</a>
</body>
</html>
