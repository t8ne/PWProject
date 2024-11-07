<?php include 'app/views/partials/header.php'; ?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Criar Música</h2>
                    <form action="<?php echo $url_alias; ?>/musica/create" method="post">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome da Música</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                value="<?php echo htmlspecialchars($data['musica']['nome'] ?? ''); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="tempo" class="form-label">Tempo</label>
                            <input type="number" class="form-control" id="tempo" name="tempo" step="0.01"
                                value="<?php echo htmlspecialchars($data['musica']['tempo'] ?? ''); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="id_album" class="form-label">Álbum</label>
                            <select class="form-select" id="id_album" name="id_album" required>
                                <?php foreach ($data['albums'] as $album): ?>
                                    <option value="<?php echo $album['id_album']; ?>" <?php echo (isset($data['musica']['id_album']) && $data['musica']['id_album'] == $album['id_album']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($album['nome']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_produtor" class="form-label">Produtor</label>
                            <select class="form-select" id="id_produtor" name="id_produtor" required>
                                <?php foreach ($data['produtores'] as $produtor): ?>
                                    <option value="<?php echo $produtor['id_produtor']; ?>" <?php echo (isset($data['musica']['id_produtor']) && $data['musica']['id_produtor'] == $produtor['id_produtor']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($produtor['nome']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="<?php echo $url_alias; ?>/musica" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Voltar para Lista de Músicas
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/partials/footer.php'; ?>