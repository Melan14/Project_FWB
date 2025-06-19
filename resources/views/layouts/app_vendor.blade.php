<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard Vendor - Culinary Sulbar')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
        }
        .sidebar {
            width: 250px;
            background: linear-gradient(to bottom, #2c3e50, #34495e);
            color: #ecf0f1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding-top: 20px;
        }
        .sidebar h4 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .sidebar a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #ecf0f1;
            text-decoration: none;
            transition: background 0.2s;
        }
        .sidebar a i {
            margin-right: 10px;
            width: 20px;
        }
        .sidebar a:hover,
        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .logout-btn {
            width: 100%;
            background: none;
            border: none;
            text-align: left;
            padding: 12px 20px;
            color: #ecf0f1;
            display: flex;
            align-items: center;
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
        <div>
            <h4><i class="fa-solid fa-utensils"></i> Culinary Sulbar</h4>
            <a href="{{ route('vendor.dashboard') }}"><i class="fa-solid fa-gauge"></i> Dashboard</a>
            <a href="{{ route('vendor.spots') }}"><i class="fa-solid fa-store"></i> Tempat Kuliner Saya</a>
            <a href="{{ route('vendor.reviews') }}"><i class="fa-solid fa-star-half-stroke"></i> Review</a>
            <a href="{{ route('profile.show') }}"><i class="fa-solid fa-user"></i> Profil</a>
        </div>

        {{-- Logout tombol di bawah kiri --}}
        <form action="{{ route('logout') }}" method="POST" class="mt-auto mb-3">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
            </button>
        </form>
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
