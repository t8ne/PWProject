<?php include 'app/views/partials/header.php'; ?>

<div class="container">
    <h2 class="mb-4">Lista de Álbuns</h2>

    <div class="mb-3">
        <a href="<?php echo $url_alias; ?>/album/create" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i>Novo Álbum
        </a>
    </div>

    <?php if (isset($data['albums']) && is_array($data['albums']) && !empty($data['albums'])): ?>
        <div class="row">
            <?php foreach ($data['albums'] as $album): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($album['nome']); ?></h5>
                            <div class="btn-group" role="group">
                                <a href="<?php echo $url_alias; ?>/album/get/<?php echo $album['id_album']; ?>"
                                    class="btn btn-primary">
                                    <i class="fas fa-eye me-1"></i>Ver
                                </a>
                                <a href="<?php echo $url_alias; ?>/album/update/<?php echo $album['id_album']; ?>"
                                    class="btn btn-warning">
                                    <i class="fas fa-edit me-1"></i>Editar
                                </a>
                                <a href="<?php echo $url_alias; ?>/album/delete/<?php echo $album['id_album']; ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('Tem certeza que deseja eliminar este álbum?');">
                                    <i class="fas fa-trash-alt me-1"></i>Eliminar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info" role="alert">
            <i class="fas fa-info-circle me-2"></i>Nenhum álbum encontrado.
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/partials/footer.php'; ?>