<?php include 'app/views/partials/header.php'; ?> <!-- Inclui o cabeçalho da página -->

<link rel="stylesheet" href="/PWProject/assets/css/style.css"> <!-- Inclui os estilos da página -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Editar Álbum</h2>
                    <!-- Form de edição do álbum, vai buscar o id -->
                    <form action="<?php echo $url_alias; ?>/album/update/<?php echo $data['album'][0]['id_album']; ?>"
                        method="POST">
                        <!-- Mudar nome -->
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                value="<?php echo htmlspecialchars($data['album'][0]['nome']); ?>" required>
                        </div>

                        <!-- Mudar data -->
                        <div class="mb-3">
                            <label for="data" class="form-label">Data:</label>
                            <input type="date" class="form-control" id="data" name="data"
                                value="<?php echo htmlspecialchars($data['album'][0]['data']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <!-- Mudar artista, dos artistas na BD -->
                            <label for="id_artista" class="form-label">Artista:</label>
                            <select class="form-select" id="id_artista" name="id_artista" required>
                                <?php foreach ($data['artistas'] as $artista): ?>
                                    <option value="<?php echo $artista['id_artista']; ?>" <?php if ($artista['id_artista'] == $data['album'][0]['id_artista'])
                                           echo 'selected'; ?>>
                                        <?php echo htmlspecialchars($artista['nome']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <!-- Mudar géneros, dos géneros na BD -->
                            <label for="id_genero" class="form-label">Género:</label>
                            <select class="form-select" id="id_genero" name="id_genero" required>
                                <?php foreach ($data['generos'] as $genero): ?>
                                    <option value="<?php echo $genero['id_genero']; ?>" <?php if ($genero['id_genero'] == $data['album'][0]['id_genero'])
                                           echo 'selected'; ?>>
                                        <?php echo htmlspecialchars($genero['nome']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="d-grid">
                            <!-- Submit das credenciais atualizadas -->
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Atualizar Álbum
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Voltar -->
            <div class="text-center mt-3">
                <a href="<?php echo $url_alias; ?>/album" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Voltar para Lista de Álbuns
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/partials/footer.php'; ?>