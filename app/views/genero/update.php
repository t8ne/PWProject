<?php include 'app/views/partials/header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Editar Género</h2>
                    <form
                        action="<?php echo $url_alias; ?>/genero/update/<?php echo $data['genero'][0]['id_genero']; ?>"
                        method="POST">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                value="<?php echo htmlspecialchars($data['genero'][0]['nome']); ?>" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Atualizar Género
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="<?php echo $url_alias; ?>/genero" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Voltar para Lista de Géneros
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/partials/footer.php'; ?>