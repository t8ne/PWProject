<?php include 'app/views/partials/header.php'; ?>

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
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Tempo:</strong> <?php echo htmlspecialchars($data['musica'][0]['tempo']); ?></p>
                                <p><strong>Álbum:</strong> <?php echo htmlspecialchars($data['musica'][0]['id_album']); ?>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Produtor:</strong>
                                    <?php
                                    if (is_null($data['musica'][0]['id_produtor'])) {
                                        echo "Produtor eliminado.";
                                    } else {
                                        echo htmlspecialchars($data['musica'][0]['id_produtor']);
                                    }
                                    ?>
                                </p>
                            </div>
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