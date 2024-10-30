<?php include 'app/views/partials/header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body text-center">
                    <h1 class="display-1 text-muted mb-4">404</h1>
                    <h3 class="card-title mb-4">Página não encontrada</h3>
                    <p class="card-text mb-4">Desculpe, a página que está á procura não existe ou foi movida.</p>
                    <a href="<?php echo $url_alias2; ?>" class="btn btn-primary">
                        <i class="fas fa-home me-2"></i>Voltar para a Página Inicial
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/partials/footer.php'; ?>