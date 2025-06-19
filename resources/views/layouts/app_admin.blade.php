<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');
        body { font-family: 'Inter', sans-serif; display: flex; min-height: 100vh; margin: 0; }
        .sidebar { width: 250px; background: #1e272e; color: #fff; padding-top: 20px; }
        .sidebar h4 { text-align: center; margin-bottom: 30px; font-weight: bold; }
        .sidebar a { color: #fff; text-decoration: none; display: flex; align-items: center; padding: 12px 20px; transition: 0.2s; }
        .sidebar a i { margin-right: 10px; width: 20px; }
        .sidebar a:hover { background-color: rgba(255,255,255,0.1); }
        .sidebar {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
        .content { flex: 1; padding: 30px; background: #f4f6f9; }
    </style>
</head>
<body>
    @include('partials.sidebar_admin')
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
