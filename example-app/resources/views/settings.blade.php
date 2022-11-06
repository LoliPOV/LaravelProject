@extends('layouts.app')
@section('title')Добавление идеи@endsection
@section('content')
<body class="antialiased">
<form id="register_form" action="/user_settings" method="GET">
    @csrf
    <div>
        <h1>Настройки пользовательской страницы</h1>
        <label>
            Сделать страницу приватной:
            <input type="checkbox" name = 'private'>
        </label><br><br>
        <input type="submit">
    </div>
</form>
<a href="{{ url('/user/private') }}" class="btn btn-xs btn-info pull-right">Учетная запись</a><br>
</body>
@endsection
