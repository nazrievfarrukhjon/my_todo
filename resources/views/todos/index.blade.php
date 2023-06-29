<!-- todo.blade.php -->

@extends('app')

@section('content')
    <div class="container">
        <h2>TODO List</h2>

        <div class="col-md-6">
            <form action="{{ route('todos.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control m-1" name="title" placeholder="Enter a new title">
                    <br>
                    <input type="text" class="form-control m-1" name="description" placeholder="Enter a new description">
                </div>
                <button type="submit" class="btn btn-success m-1">Add Todo</button>
            </form>
        </div>
    </div>

        <hr>

    <div class="container">
        <h2>TODO List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
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
                            <button type="submit" class="">EDIT</button>
                        </form>                    <td>
                        <!-- Delete form -->
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
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
