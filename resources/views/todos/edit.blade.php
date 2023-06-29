<!-- todo.blade.php -->

@extends('app')

@section('content')
    <div class="container">
        <h2>Редактировать</h2>
        <div class="container">
            <h2>Редактировать Todo</h2>

            <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group1 m-1">
                    <label for="title">Титуль:</label>
                    <input type="text" id="title" name="title" class="form-control1" value="{{ $todo->title }}">
                </div>

                <div class="form-group1 m-1">
                    <label for="description">Описание</label>
                    <textarea rows="3" cols="30" name="description" id="description" class="form-control1">{{ $todo->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    <script>

    </script>
@endsection
