<?php include 'app/views/partials/header.php'; ?>

<link rel="stylesheet" href="/PWProject/assets/css/style.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Confirmar Exclusão</h2>
                    <p class="card-text text-center mb-4"><?php echo htmlspecialchars($data['info']); ?></p>
                    <div class="d-flex justify-content-center">
                        <a href="<?php echo $url_alias; ?>/genero/deleteWithAlbums/<?php echo $data['genero_id']; ?>"
                            class="btn btn-danger me-2">
                            <i class="fas fa-trash-alt me-2"></i>Sim, excluir tudo
                        </a>
                        <a href="<?php echo $url_alias; ?>/genero" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Não, cancelar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/partials/footer.php'; ?>