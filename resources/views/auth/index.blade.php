<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Culinary Sulbar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .bg-cover {
            background-image: url('/images/kuliner-sulbar.png'); 
            background-size: cover;
            background-position: center;
            height: 100%;
            position: relative;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.6); /* gelapkan background agar teks lebih terbaca */
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            color: white;
            padding: 2rem;
        }
    </style>
</head>
<body>
    <div class="bg-cover">
        <div class="overlay">
            <h1 class="display-4 fw-bold mb-3">Culinary Sulbar</h1>
            <p class="lead mb-4">Menjelajahi kelezatan kuliner khas Sulawesi Barat, dari Jepa hingga Ikan Bakar Mandar</p>
            <div>
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-3">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">Register</a>
            </div>
        </div>
    </div>
</body>
</html>
