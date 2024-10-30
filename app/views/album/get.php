<?php include 'app/views/partials/header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-body">
                    <?php if (empty($data['album'])): ?>
                        <h1 class="text-center">O álbum não existe na nossa base de dados...</h1>
                    <?php else: ?>
                        <h2 class="card-title text-center mb-4"><?php echo htmlspecialchars($data['album'][0]['nome']); ?>
                        </h2>
                        <p class="text-center mb-4">
                            <strong>Data:</strong> <?php echo htmlspecialchars($data['album'][0]['data']); ?>
                        </p>

                        <h3 class="text-center mb-3">Músicas</h3>
                        <?php if (!empty($data['musicas']) && is_array($data['musicas'])): ?>
                            <div class="list-group">
                                <?php foreach ($data['musicas'] as $musica): ?>
                                    <a href="<?php echo $url_alias; ?>/musica/get/<?php echo $musica['id_musica']; ?>"
                                        class="list-group-item list-group-item-action">
                                        <i class="fas fa-music me-2"></i><?php echo htmlspecialchars($musica['nome']); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <p class="text-center">Não existem músicas associadas a este álbum.</p>
                        <?php endif; ?>
                    <?php endif; ?>
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