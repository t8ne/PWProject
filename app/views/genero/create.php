<?php include 'app/views/partials/header.php'; ?>

<!-- Inclusão do arquivo de estilos CSS -->
<link rel="stylesheet" href="/PWProject/assets/css/style.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Card principal para o formulário -->
            <div class="card mt-5">
                <div class="card-body">
                    <!-- Título do formulário -->
                    <h2 class="card-title text-center mb-4">Criar Novo Género</h2>

                    <!-- Formulário para criação de gênero -->
                    <form action="<?php echo $url_alias; ?>/genero/create" method="POST">
                        <!-- Campo para o nome do gênero -->
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>

                            <!-- Campo para a descrição do gênero -->
                            <label for="descricao" class="form-label">Descrição:</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" required>
                        </div>

                        <!-- Botão para enviar o formulário -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus-circle me-2"></i>Criar Género
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
