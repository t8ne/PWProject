<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING); // Oculta Notices e Warnings
session_start();


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

    header("Location: " . $url_alias2);
    exit();
}

include 'app/views/partials/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h2 style="text-align: center">Login</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nome de utilizador</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Palavra-passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/partials/footer.php'; ?>