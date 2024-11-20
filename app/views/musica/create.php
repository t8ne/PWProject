<?php include 'app/views/partials/header.php'; ?> <!-- Inclui o cabeçalho da página -->

<link rel="stylesheet" href="/PWProject/assets/css/style.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5"> <!-- Cartão para centralizar o formulário -->
                <div class="card-body">
                    <!-- Título do formulário -->
                    <h2 class="card-title text-center mb-4">Criar Música</h2>
                    <!-- Início do formulário para criar uma nova música -->
                    <form action="<?php echo $url_alias; ?>/musica/create" method="post">
                        <!-- Campo para inserir o nome da música -->
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome da Música</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                value="<?php echo htmlspecialchars($data['musica']['nome'] ?? ''); ?>" required> <!-- Pré-preenche o campo, caso haja dados -->
                        </div>

                        <!-- Campo para inserir o tempo da música -->
                        <div class="mb-3">
                            <label for="tempo" class="form-label">Tempo</label>
                            <input type="number" class="form-control" id="tempo" name="tempo" step="0.01"
                                value="<?php echo htmlspecialchars($data['musica']['tempo'] ?? ''); ?>" required> <!-- Aceita valores decimais -->
                        </div>

                        <!-- Seleção do álbum ao qual a música pertence -->
                        <div class="mb-3">
                            <label for="id_album" class="form-label">Álbum</label>
                            <select class="form-select" id="id_album" name="id_album" required>
                                <?php foreach ($data['albums'] as $album): ?> <!-- Itera sobre a lista de álbuns disponíveis -->
                                    <option value="<?php echo $album['id_album']; ?>" 
                                        <?php echo (isset($data['musica']['id_album']) && $data['musica']['id_album'] == $album['id_album']) ? 'selected' : ''; ?>> <!-- Mantém o álbum selecionado, se aplicável -->
                                        <?php echo htmlspecialchars($album['nome']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Seleção do produtor da música -->
                        <div class="mb-3">
                            <label for="id_produtor" class="form-label">Produtor</label>
                            <select class="form-select" id="id_produtor" name="id_produtor" required>
                                <?php foreach ($data['produtores'] as $produtor): ?> <!-- Itera sobre a lista de produtores disponíveis -->
                                    <option value="<?php echo $produtor['id_produtor']; ?>" 
                                        <?php echo (isset($data['musica']['id_produtor']) && $data['musica']['id_produtor'] == $produtor['id_produtor']) ? 'selected' : ''; ?>> <!-- Mantém o produtor selecionado, se aplicável -->
                                        <?php echo htmlspecialchars($produtor['nome']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Botão para salvar a nova música -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Salvar <!-- Ícone e texto do botão -->  </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Botão para voltar à lista de músicas -->
            <div class="text-center mt-3">
                <a href="<?php echo $url_alias; ?>/musica" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Voltar para Lista de Músicas
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/partials/footer.php'; ?> <!-- Inclui o rodapé da página -->
