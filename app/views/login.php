<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING); // Oculta Notices e Warnings
session_start();

$warning = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'admin') {
        $_SESSION['user'] = $username;
        $_SESSION['isAdmin'] = true;
        header("Location: /PWProject/");  // Adjust this path as needed
        exit();
    } elseif ($username === 'admin' && $password !== 'admin') {
        $warning = 'Palavra-passe incorreta para o administrador.';
    } else {
        $_SESSION['user'] = $username;
        $_SESSION['isAdmin'] = false;
        header("Location: /PWProject/");  // Adjust this path as needed
        exit();
    }
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
                <?php if ($warning): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($warning); ?>
                    </div>
                <?php endif; ?>
                <form method="POST" action="" id="loginForm">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nome de utilizador</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Palavra-passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary" id="loginButton">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');
        const loginButton = document.getElementById('loginButton');
        const loginForm = document.getElementById('loginForm');

        function checkAdminCredentials() {
            if (usernameInput.value === 'admin' && passwordInput.value === 'admin') {
                loginButton.disabled = false;
            } else if (usernameInput.value === 'admin') {
                loginButton.disabled = true;
            } else {
                loginButton.disabled = false;
            }
        }

        usernameInput.addEventListener('input', checkAdminCredentials);
        passwordInput.addEventListener('input', checkAdminCredentials);

        loginForm.addEventListener('submit', function (event) {
            if (usernameInput.value === 'admin' && passwordInput.value !== 'admin') {
                event.preventDefault();
                alert('Palavra-passe incorreta para o administrador.');
            }
        });
    });
</script>

<?php include 'app/views/partials/footer.php'; ?>