@extends('layouts.app')

@section('title')Регистрация@endsection

@section('content')
    <div class="mb-2">
        <h1>Регистрация</h1>
    </div>
        <form id="register_form" action="/register" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Адрес электронной почты</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Повторите пароль</label>
                <input name="repeat_password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-2">
                <input type="submit" class="submit">
            </div>
        </form>
@endsection

