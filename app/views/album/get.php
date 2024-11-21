<?php include 'app/views/partials/header.php'; ?> <!-- Inclui o cabeçalho da página -->

<link rel="stylesheet" href="/PWProject/assets/css/style.css"> <!-- Inclui os estilos da página -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-body">
                    <!-- Debug, caso exista um bug e o álbum não exista -->
                    <?php if (empty($data['album'])): ?>
                        <h1 class="text-center">O álbum não existe na nossa base de dados...</h1>
                    <?php else: ?>
                        <!-- Mostrar o nome do álbum -->
                        <h2 class="card-title text-center mb-4"><?php echo htmlspecialchars($data['album'][0]['nome']); ?>
                        </h2>
                        <p class="text-center mb-4">
                            <!-- Mostrar a data do álbum -->
                            <strong>Data:</strong> <?php echo htmlspecialchars($data['album'][0]['data']); ?>
                        </p>

                        <!-- Artista á qual o album pertence-->
                        <h3 class="text-center mb-3">Artista</h3>
                        <div class="list-group mb-4">
                            <?php if (!empty($data['album'][0]['id_artista'])): ?>
                                <!-- Caso houver álbuns -->
                                <a href="<?php echo $url_alias; ?>/artista/get/<?php echo htmlspecialchars($data['album'][0]['id_artista']); ?>"
                                    class="list-group-item list-group-item-action">
                                    <i
                                        class="fas fa-user me-2"></i><?php echo htmlspecialchars($data['album'][0]['nome_artista']); ?>
                                </a>
                            <?php else: ?>
                                <!-- Caso não houver álbuns -->
                                <div class="list-group-item">Artista não disponível</div>
                            <?php endif; ?>
                        </div>

                        <!-- Músicas que pertencem o álbum -->
                        <h3 class="text-center mb-3">Músicas</h3>
                        <?php if (!empty($data['musicas']) && is_array($data['musicas'])): ?>
                            <div class="list-group">
                                <!-- Caso houver músicas -->
                                <?php foreach ($data['musicas'] as $musica): ?>
                                    <a href="<?php echo $url_alias; ?>/musica/get/<?php echo $musica['id_musica']; ?>"
                                        class="list-group-item list-group-item-action">
                                        <i class="fas fa-music me-2"></i><?php echo htmlspecialchars($musica['nome']); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <!-- Caso não houver músicas -->
                            <p class="text-center">Não existem músicas associadas a este álbum.</p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="text-center mt-3">
                <!-- Voltar á tab dos albuns -->
                <a href="<?php echo $url_alias; ?>/album" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Voltar para Lista de Álbuns
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/partials/footer.php'; ?> <!-- Inclui o footer da página -->