<?php include 'app/views/partials/header.php'; ?> <!-- Inclui o cabeçalho da página -->

<link rel="stylesheet" href="/PWProject/assets/css/style.css">

<div class="container">
    <div class="row justify-content-center"> <!-- Centraliza horizontalmente o conteúdo na página -->
        <div class="col-md-6"> <!-- Define a largura máxima da área de edição -->
            <div class="card mt-5"> <!-- Cria um cartão com margem superior -->
                <div class="card-body">
                    <!-- Título do formulário de edição -->
                    <h2 class="card-title text-center mb-4">Editar Artista</h2>

                    <!-- Formulário para editar as informações do artista -->
                    <form
                        action="<?php echo htmlspecialchars($url_alias ?? ''); ?>/artista/update/<?php echo htmlspecialchars($data['artista']['id_artista'] ?? ''); ?>"
                        method="POST"> <!-- Define o destino e o método do formulário -->

                        <!-- Campo para editar o nome do artista -->
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label> <!-- Rótulo do campo -->
                            <input type="text" class="form-control" id="nome" name="nome"
                                value="<?php echo htmlspecialchars($data['artista']['nome'] ?? ''); ?>" required>
                            <!-- Campo obrigatório -->
                        </div>

                        <!-- Campo para editar a nacionalidade do artista -->
                        <div class="mb-3">
                            <label for="nacionalidade" class="form-label">Nacionalidade:</label>
                            <!-- Rótulo do campo -->
                            <input type="text" class="form-control" id="nacionalidade" name="nacionalidade"
                                value="<?php echo htmlspecialchars($data['artista']['nacionalidade'] ?? ''); ?>"
                                required> <!-- Campo obrigatório -->
                        </div>

                        <!-- Botão para submeter as alterações -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Atualizar Artista <!-- Ícone e texto do botão -->
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Botão para voltar à lista de artistas -->
            <div class="text-center mt-3">
                <a href="<?php echo htmlspecialchars($url_alias ?? ''); ?>/artista" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Voltar para Lista de Artistas
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/partials/footer.php'; ?> <!-- Inclui o rodapé da página -->