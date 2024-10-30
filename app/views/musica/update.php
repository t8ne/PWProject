<?php include 'app/views/partials/header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Editar Música</h2>
                    <form
                        action="<?php echo $url_alias; ?>/musica/update/<?php echo $data['musica'][0]['id_musica']; ?>"
                        method="POST">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                value="<?php echo htmlspecialchars($data['musica'][0]['nome']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="tempo" class="form-label">Tempo:</label>
                            <input type="text" class="form-control" id="tempo" name="tempo"
                                value="<?php echo htmlspecialchars($data['musica'][0]['tempo']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="id_album" class="form-label">Álbum:</label>
                            <select class="form-select" id="id_album" name="id_album" required>
                                <?php foreach ($data['albums'] as $album): ?>
                                    <option value="<?php echo $album['id_album']; ?>" <?php echo ($data['musica'][0]['id_album'] == $album['id_album']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($album['nome']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_produtor" class="form-label">Produtor:</label>
                            <select class="form-select" id="id_produtor" name="id_produtor" required>
                                <?php foreach ($data['produtores'] as $producer): ?>
                                    <option value="<?php echo $producer['id_produtor']; ?>" <?php echo ($data['musica'][0]['id_produtor'] == $producer['id_produtor']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($producer['nome']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Atualizar Música
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