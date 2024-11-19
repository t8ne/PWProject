<?php
session_start();

// Verificar se o usuário está fazendo logout
if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    unset($_SESSION['isAdmin']);
    header("Location: " . $url_alias . "/");
    exit();
}

// Processar o login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'admin') {
        $_SESSION['user'] = $username;
        $_SESSION['isAdmin'] = true;
    } else {
        $_SESSION['user'] = $username;
        $_SESSION['isAdmin'] = false;
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$isAdmin = $_SESSION['isAdmin'] ?? false;
$loggedInUser = $_SESSION['user'] ?? null;
?>

<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sound808</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        /* Imagem de fundo */
        body {
    background-image: url('../PWProject/imgs/back.jpg'); /* Verifique o caminho da imagem */
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    color: #333; /* Alterar a cor do texto para um cinza escuro */
}

/* Navbar e links */
.navbar {
    background-color: rgba(108, 117, 125, 0.9); /* Navbar levemente opaca */
}

.navbar-brand,
.nav-link {
    color: #ffffff !important;
}

/* Jumbotron e Cartões */
.jumbotron {
    background-color: rgba(255, 255, 255, 0.8); /* Fundo branco semi-transparente */
    padding: 2rem;
    margin-bottom: 2rem;
    border-radius: 0.3rem;
    color: #333; /* Cor do texto */
}

.card {
    background-color: rgba(255, 255, 255, 0.9); /* Fundo branco semi-transparente */
    transition: transform 0.2s;
    color: #333; /* Cor do texto */
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
                <i class="fas fa-music me-2"></i>Sound808
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
                    <li class="nav-item">
                        <a class="nav-link">|</a>
                    </li>
                    <li class="nav-item">
                        <?php if ($loggedInUser): ?>
                            <a class="nav-link" href="<?php echo $url_alias; ?>/?logout=1">Logout
                                (<?php echo htmlspecialchars($loggedInUser); ?>)</a>
                        <?php else: ?>
                            <a class="nav-link" href="<?php echo $url_alias; ?>/login">Login</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">