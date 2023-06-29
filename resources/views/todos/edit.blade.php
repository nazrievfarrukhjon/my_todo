<!-- todo.blade.php -->

@extends('app')

@section('content')
    <div class="container">
        <div class="container">
            <h2 style="text-align: center">Редактировать Todo</h2>

            <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="title" class="ot">Титуль:</label>
                <input class="ot" type="text" id="title" name="title" style="width: 100%" value="{{ $todo->title }}">
                <label for="description" class="ot">Описание</label>
                <textarea rows="3" cols="" name="description" id="description" class="ot">{{ $todo->description }}</textarea>
                <br>

                <button type="submit" class="btn-success">Обновить</button>
            </form>
        </div>
    <script>

    </script>
@endsection
