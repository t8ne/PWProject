<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto PW - Música</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #6c757d;
        }

        .navbar-brand,
        .nav-link {
            color: #ffffff !important;
        }

        .jumbotron {
            background-color: #e9ecef;
            padding: 2rem;
            margin-bottom: 2rem;
            border-radius: 0.3rem;
        }

        .card {
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?php echo $url_alias2; ?>">
                <i class="fas fa-music me-2"></i>Projeto PW
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url_alias; ?>/artista">Artistas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url_alias; ?>/genero">Géneros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url_alias; ?>/album">Álbuns</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url_alias; ?>/musica">Músicas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url_alias; ?>/produtor">Produtores</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">