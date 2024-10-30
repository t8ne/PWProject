<?php include 'app/views/partials/header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <?php
                    $produtor = isset($data['produtor']) && is_array($data['produtor']) ? $data['produtor'] : null;

                    if ($produtor): ?>
                        <h2 class="card-title text-center mb-4">Editar Produtor</h2>
                        <form
                            action="<?php echo $url_alias; ?>/produtor/update/<?php echo htmlspecialchars($produtor['id_produtor'] ?? ''); ?>"
                            method="POST">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome"
                                    value="<?php echo htmlspecialchars($produtor['nome'] ?? ''); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="nacionalidade" class="form-label">Nacionalidade:</label>
                                <input type="text" class="form-control" id="nacionalidade" name="nacionalidade"
                                    value="<?php echo htmlspecialchars($produtor['nacionalidade'] ?? ''); ?>" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Atualizar Produtor
                                </button>
                            </div>
                        </form>
                    <?php else: ?>
                        <p class="text-center">Produtor não encontrado.</p>
                    <?php endif; ?>
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