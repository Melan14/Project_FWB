<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Culinary Sulbar')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }
        .sidebar {
            width: 250px;
            background: linear-gradient(to bottom, #2c3e50, #34495e);
            color: #ecf0f1;
            padding-top: 20px;
        }
        .sidebar h4 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }
        .sidebar a {
            color: #ecf0f1;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 12px 20px;
            transition: background 0.2s;
        }
        .sidebar a i {
            margin-right: 10px;
            width: 20px;
        }
        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            text-decoration: none;
        }
        .content {
            flex: 1;
            padding: 30px;
            background: #f4f6f9;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4><i class="fa-solid fa-utensils"></i> Culinary Sulbar</h4>
        <a href="{{ url('/dashboard') }}"><i class="fa-solid fa-gauge"></i> Dashboard</a>
        <a href="{{ url('/makanan') }}"><i class="fa-solid fa-bowl-rice"></i> Data Makanan</a>
        <a href="{{ route('profile.show') }}"><i class="fa-solid fa-user"></i> Profil</a>
        <a href="{{ url('/logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
