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
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 10px;
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
            margin-top: 10px;
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
    </style>
</head>
<body>
@yield('content')
</body>
</html>
