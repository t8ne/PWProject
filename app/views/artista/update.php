<?php include 'app/views/partials/header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Editar Artista</h2>
                    <form
                        action="<?php echo htmlspecialchars($url_alias ?? ''); ?>/artista/update/<?php echo htmlspecialchars($data['artista']['id_artista'] ?? ''); ?>"
                        method="POST">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                value="<?php echo htmlspecialchars($data['artista']['nome'] ?? ''); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nacionalidade" class="form-label">Nacionalidade:</label>
                            <input type="text" class="form-control" id="nacionalidade" name="nacionalidade"
                                value="<?php echo htmlspecialchars($data['artista']['nacionalidade'] ?? ''); ?>"
                                required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Atualizar Artista
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="<?php echo htmlspecialchars($url_alias ?? ''); ?>/artista" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Voltar para Lista de Artistas
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/partials/footer.php'; ?>