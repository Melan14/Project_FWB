<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard Foodie')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            background: #2d3436;
            color: #fff;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 12px 20px;
            transition: 0.2s;
        }

        .sidebar a i {
            margin-right: 10px;
            width: 20px;
        }

        .sidebar a:hover {
            background-color: rgba(255,255,255,0.1);
        }

        .logout-form {
            position: absolute;
            bottom: 20px;
            left: 0;
            width: 100%;
            padding: 0 20px;
        }

        .logout-form button {
            color: #fff;
            background: transparent;
            border: none;
            display: flex;
            align-items: center;
            padding: 12px 0;
            width: 100%;
        }

        .logout-form button:hover {
            background-color: rgba(255,255,255,0.1);
        }

        .content {
            flex: 1;
            padding: 30px;
            background: #f4f6f9;
        }
    </style>
</head>
<body>

    @include('partials.sidebar_foodie')

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
