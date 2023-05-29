<!-- todo.blade.php -->

@extends('app')

@section('content')
    <div class="container">
        <h2>EDIT</h2>
        <div class="container">
            <h2>Edit Todo</h2>

            <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <input type="text" name="title" id="title" class="form-control" value="{{ $todo->title }}">
                    <label for="title">Title</label>

                </div>

                <div class="form-group">
                    <textarea name="description" id="description" class="form-control">{{ $todo->description }}</textarea>
                    <label for="description">Description</label>

                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    <script>

    </script>
@endsection
