
@extends('layouts.app')
@section('title')Добавление идеи@endsection
@section('content')
    <form action="/realiseidea" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Введите название идеи</label>
            <input type="text" name="idea_name" placeholder="Введите название идеи" id="title">
            @error('idea_name')
            <div>{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Опишите свою идею</label>
            <textarea id="description" name="description"  placeholder="Введите название идеи" cols = 30 rows = 3 ></textarea>
            @error('description')
            <div>{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tags"></label>
            <input name="tag" readonly="true" id ="tags"><br>
            <label for="tag">Выберите теги</label>
            <input type="text" list="identification" id="tag" autocomplete="off"  oninput='onInput()' placeholder="выберите тег">
            @error('tag')
            <div>{{$message}}</div>
            @enderror
            <datalist id="identification">
                <option value="It">
                <option value="Designer">
                <option value="Data saints">
                <option value="Imed">
                <option value="Datalist">
            </datalist>

            <script>
                function onInput() {
                    let val = document.getElementById("tag").value;
                    let opts = document.getElementById('identification').childNodes;
                    let inpVal = document.getElementById("tag");
                    for (let i = 0; i < opts.length; i++) {
                        if (opts[i].value === val) {
                            if(document.getElementById('tags').value === ""){
                                document.getElementById('tags').value = opts[i].value;
                            }
                            else{
                                document.getElementById('tags').value = document.getElementById('tags').value + ", " + opts[i].value;
                            }
                            inpVal.value = " ";
                            opts[i].remove();
                            break;
                        }
                    }
                }
            </script>
        </div>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
@endsection('content')


