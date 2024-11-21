<?php include 'app/views/partials/header.php'; ?> <!-- Inclui o cabeçalho da página -->

<link rel="stylesheet" href="/PWProject/assets/css/style.css"> <!-- Inclui os estilos da página-->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body"> <!-- Corpo da card onde se encontra a confirmação final -->
                    <h2 class="card-title text-center mb-4">Confirmar Exclusão</h2>
                    <p class="card-text text-center mb-4"><?php echo htmlspecialchars($data['info']); ?></p>
                    <!-- Info do Artista pra eliminar-->
                    <div class="d-flex justify-content-center">
                        <!-- Fetch do álbum(s) do artista que contêm, ou não, músicas para serem eliminadas-->
                        <a href="<?php echo $url_alias; ?>/album/deleteWithMusicas/<?php echo $data['album_id']; ?>"
                            class="btn btn-danger me-2">
                            <i class="fas fa-trash-alt me-2"></i>Sim, excluir tudo <!-- Confirmação -->
                        </a>
                        <a href="<?php echo $url_alias; ?>/album" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Não, cancelar <!-- Voltar atrás -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/partials/footer.php'; ?> <!-- Inclui o footer -->