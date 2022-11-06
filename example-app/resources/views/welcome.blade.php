@extends('layouts.app')

@section('title')Авторизация@endsection
@section('content')
    <body class="antialiased">
    @error('user_not_find')
    <div>{{$message}}</div>
    @enderror
    @foreach($idea as $data)
        <div class="idea" >
            <div id="idea">
                <h2>Имя идеии: <h3>{{$data -> idea_name}}</h3></h2>
            </div>
            <div id="descriptions">
                <h2>Описание идеи:</h2><h3>{{$data->description}}</h3>
            </div>
            <div id="tag">
                <h2>Тэги:</h2><h3>{{$data->tag}}</h3>
            </div>
        </div>
    @endforeach
@endsection
