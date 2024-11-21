<?php include 'app/views/partials/header.php'; ?>

<!-- Inclusão do CSS -->
<link rel="stylesheet" href="/PWProject/assets/css/style.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Card para o formulário -->
            <div class="card mt-5">
                <div class="card-body">
                    <!-- Título do formulário -->
                    <h2 class="card-title text-center mb-4">Editar Género</h2>

                    <!-- Formulário para edição do gênero -->
                    <form action="<?php echo $url_alias; ?>/genero/update/<?php echo $data['genero'][0]['id_genero']; ?>" method="POST">
                        <!-- Campo Nome -->
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <!-- Campo preenchido com o nome atual do gênero -->
                            <input type="text" class="form-control" id="nome" name="nome" 
                                value="<?php echo htmlspecialchars($data['genero'][0]['nome']); ?>" required>
                        </div>

                        <!-- Botão para salvar alterações -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Atualizar Género
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Botão para voltar à lista de gêneros -->
            <div class="text-center mt-3">
                <a href="<?php echo $url_alias; ?>/genero" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Voltar para Lista de Géneros
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/partials/footer.php'; ?>
