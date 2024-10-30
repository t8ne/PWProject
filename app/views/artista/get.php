<?php include 'app/views/partials/header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4"><?php echo htmlspecialchars($data['artista']['nome']); ?>
                    </h2>
                    <p class="text-center mb-4">
                        <strong>Nacionalidade:</strong>
                        <?php echo htmlspecialchars($data['artista']['nacionalidade']); ?>
                    </p>
                    <h3 class="text-center mb-3">Álbuns</h3>
                    <?php if (!empty($data['albums'])): ?>
                        <div class="list-group">
                            <?php foreach ($data['albums'] as $album): ?>
                                <a href="<?php echo $url_alias; ?>/album/get/<?php echo $album['id_album']; ?>"
                                    class="list-group-item list-group-item-action">
                                    <i class="fas fa-compact-disc me-2"></i><?php echo htmlspecialchars($album['nome']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-center">Este artista não tem álbuns registrados.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="<?php echo $url_alias; ?>/artista" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Voltar para Lista de Artistas
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/partials/footer.php'; ?>