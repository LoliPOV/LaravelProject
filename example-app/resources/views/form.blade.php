<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #4a5568;
            color: crimson;
        }
        a {
            text-decoration: none !important;
            color: tomato;
        }
    </style>
</head>
<body class="antialiased">
<h1>Вход</h1>
<form id="register_form" action="/form" method="POST">
    @csrf
    <div id="email_div">
        <label for="email">Почта</label>
        <input name="email" type="text" placeholder="Почта">
        @error('email')
        <div>{{$message}}</div>
        @enderror
    </div>
    <input type="submit">
</form>
</body>
</html>
