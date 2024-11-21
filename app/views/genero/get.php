<?php include 'app/views/partials/header.php'; ?>

<!-- Inclusão do arquivo de estilos CSS -->
<link rel="stylesheet" href="/PWProject/assets/css/style.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card principal -->
            <div class="card mt-5">
                <div class="card-body">
                    <?php if (empty($data['genero'])): ?>
                        <!-- Mensagem caso o gênero não exista -->
                        <h1 class="text-center">O género não existe na nossa base de dados...</h1>
                    <?php else: ?>
                        <!-- Exibe o nome do gênero -->
                        <h2 class="card-title text-center mb-4">
                            <?php echo htmlspecialchars($data['genero'][0]['nome']); ?>
                        </h2>

                        <!-- Seção de álbuns relacionados ao gênero -->
                        <h3 class="text-center mb-3">Álbuns</h3>
                        <?php if (!empty($data['albums']) && is_array($data['albums'])): ?>
                            <!-- Lista de álbuns associados ao gênero -->
                            <div class="list-group">
                                <?php foreach ($data['albums'] as $album): ?>
                                    <a href="<?php echo $url_alias; ?>/album/get/<?php echo $album['id_album']; ?>"
                                        class="list-group-item list-group-item-action">
                                        <!-- Ícone e nome do álbum -->
                                        <i class="fas fa-compact-disc me-2"></i>
                                        <?php echo htmlspecialchars($album['nome']); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <!-- Mensagem caso não haja álbuns -->
                            <p class="text-center">Não existem álbuns associados a este género.</p>
                        <?php endif; ?>
                    <?php endif; ?>
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

<!-- Inclusão do rodapé -->
<?php include 'app/views/partials/footer.php'; ?>
