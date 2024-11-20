<?php include 'app/views/partials/header.php'; ?>

<link rel="stylesheet" href="/PWProject/assets/css/style.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-body">
                    <?php if (empty($data['musica'])): ?>
                        <h1 class="text-center">A música não existe na nossa base de dados...</h1>
                    <?php else: ?>
                        <h2 class="card-title text-center mb-4"><?php echo htmlspecialchars($data['musica'][0]['nome']); ?>
                        </h2>
                        <p class="text-center"><strong>Tempo:</strong>
                            <?php echo htmlspecialchars($data['musica'][0]['tempo']); ?>m</p>

                        <h3 class="text-center mb-3">Álbum</h3>
                        <div class="list-group mb-4">
                            <?php if (!empty($data['musica'][0]['id_album'])): ?>
                                <a href="<?php echo $url_alias; ?>/album/get/<?php echo htmlspecialchars($data['musica'][0]['id_album']); ?>"
                                    class="list-group-item list-group-item-action">
                                    <i
                                        class="fas fa-compact-disc me-2"></i><?php echo htmlspecialchars($data['musica'][0]['nome_album']); ?>
                                </a>
                            <?php else: ?>
                                <div class="list-group-item">Álbum não disponível</div>
                            <?php endif; ?>
                        </div>

                        <h3 class="text-center mb-3">Produtor</h3>
                        <div class="list-group">
                            <?php if (!empty($data['musica'][0]['id_produtor'])): ?>
                                <a href="<?php echo $url_alias; ?>/produtor/get/<?php echo htmlspecialchars($data['musica'][0]['id_produtor']); ?>"
                                    class="list-group-item list-group-item-action">
                                    <i
                                        class="fas fa-user me-2"></i><?php echo htmlspecialchars($data['musica'][0]['nome_produtor']); ?>
                                </a>
                            <?php else: ?>
                                <div class="list-group-item">Produtor eliminado</div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
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