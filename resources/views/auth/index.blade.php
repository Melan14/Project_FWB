<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Culinary Sulbar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap & Google Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .bg-cover {
            background-image: url('/images/kuliner-sulbar.png');
            background-size: cover;
            background-position: center;
            height: 100%;
            position: relative;
        }

        .overlay {
            background: linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.7));
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            color: white;
            padding: 2rem;
        }

        h1 {
            font-weight: 700;
            font-size: 3rem;
        }

        p.lead {
            font-size: 1.25rem;
            max-width: 600px;
        }

        .btn-primary {
            background-color: #f39c12;
            border-color: #e67e22;
        }

        .btn-primary:hover {
            background-color: #e67e22;
            border-color: #d35400;
        }

        .btn-outline-light:hover {
            background-color: white;
            color: #000;
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 2rem;
            }

            p.lead {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="bg-cover">
        <div class="overlay">
            <h1 class="mb-3">Culinary Sulbar</h1>
            <p class="lead mb-4">
                Jelajahi cita rasa kuliner khas Sulawesi Barat: dari <strong>Jepa</strong>, <strong>Sambusa</strong>, hingga <strong>Ikan Bakar Mandar</strong>.
            </p>
            <div>
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-3 px-4">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-4">Register</a>
            </div>
        </div>
    </div>
</body>
</html>
