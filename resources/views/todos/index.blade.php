<!-- todo.blade.php -->

@extends('app')

@section('content')

    <div class="container">
        <div class="image-container">
{{--            <img src="{{ url('images/exam.jpeg') }}" alt="EXAMS">--}}
        </div>
        <h2>Добавить заметку</h2>

        <div class="col-md-6">
            <form action="{{ route('todos.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input style="width: 200px" type="text" class="form-control m-1" name="title" placeholder="введите новый титиуль">
                    <br>
                    <input style="width: 200px" type="text" class="form-control m-1" name="description" placeholder="введите новое описание">
                </div>
                <button type="submit" class="btn btn-success m-1">Добавить</button>
            </form>
        </div>
    </div>

        <hr>

    <div class="container">
        <h2>Список заметок</h2>

        <table class="table">
            <thead>
            <tr>
                <th>Титуль</th>
                <th>Описание</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($todos as $todo)
                <tr>
                    <td>{{ $todo->title }}</td>
                    <td>{{ $todo->description }}</td>
                    <td>
                        <!-- EDIT buttons -->
                        <form action="{{ route('todos.edit', $todo->id) }}" method="GET" class="d-inline">
                            @csrf
                            @method('GET')
                            <button type="submit" class="">редактировать</button>
                        </form>                    <td>
                        <!-- Delete form -->
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">удалить</button>
                        </form>
                    </td>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>

    </script>
@endsection
