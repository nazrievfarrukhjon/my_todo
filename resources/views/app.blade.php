<!-- app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO List</title>
    <!-- Include your CSS stylesheets here -->
    <style>
        body {
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 3px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 5px;
        }

        .btn-success {
            background-color: #bde392;
            border-color: #c4ea9c;
            color: #fff;
        }

        .btn-danger {
            background-color: #d47d66;
            border-color: #e88782;
            color: #fff;
        }

        table {
            margin-top: 5px;
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
        }

        tr:last-child td {
            border-bottom: none;
        }
        .m-1 {
            margin: 0.4rem;
        }
        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-group1 {
            display: flex;
            align-items: center;
            width: 700px; /* Adjust the width as needed */
        }

        .form-group1 label {
            margin-right: 5px; /* Add space between the label and input */
        }

        .form-group1 input {
            flex-grow: 3;
        }
        .ot {
            margin-bottom: 0.5rem;
            width: 100%;
        }


    </style>
</head>
<body>
<a href="{{ route('todos.index') }}" class="btn btn-primary">главное</a>
@yield('content')
</body>
</html>
