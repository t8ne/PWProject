<?php include 'app/views/partials/header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Criar Novo Produtor</h2>
                    <form action="<?php echo $url_alias; ?>/produtor/create" method="POST">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>

                        <div class="mb-3">
                            <label for="nacionalidade" class="form-label">Nacionalidade:</label>
                            <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus-circle me-2"></i>Criar Produtor
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="<?php echo $url_alias; ?>/produtor" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Voltar para Lista de Produtores
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/partials/footer.php'; ?>