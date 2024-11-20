<?php include 'app/views/partials/header.php'; ?>

<link rel="stylesheet" href="/PWProject/assets/css/style.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Criar Novo Álbum</h2>
                    <form action="<?php echo $url_alias; ?>/album/create" method="post">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome do Álbum:</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                value="<?php echo htmlspecialchars($data['album']['nome'] ?? ''); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="data" class="form-label">Data:</label>
                            <input type="date" class="form-control" id="data" name="data"
                                value="<?php echo htmlspecialchars($data['album']['data'] ?? ''); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="id_genero" class="form-label">Gênero:</label>
                            <select class="form-select" id="id_genero" name="id_genero" required>
                                <?php foreach ($data['generos'] as $genero): ?>
                                    <option value="<?php echo $genero['id_genero']; ?>" <?php echo (isset($data['album']['id_genero']) && $data['album']['id_genero'] == $genero['id_genero']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($genero['nome']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_artista" class="form-label">Artista:</label>
                            <select class="form-select" id="id_artista" name="id_artista" required>
                                <?php foreach ($data['artistas'] as $artista): ?>
                                    <option value="<?php echo $artista['id_artista']; ?>" <?php echo (isset($data['album']['id_artista']) && $data['album']['id_artista'] == $artista['id_artista']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($artista['nome']); ?>
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
                <a href="<?php echo $url_alias; ?>/album" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Voltar para Lista de Álbuns
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/partials/footer.php'; ?>