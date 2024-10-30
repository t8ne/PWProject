<?php include 'app/views/partials/header.php'; ?>

<div class="container">
    <h2 class="mb-4">Lista de Géneros</h2>

    <div class="mb-3">
        <a href="<?php echo $url_alias; ?>/genero/create" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i>Novo Género
        </a>
    </div>

    <?php
    if (isset($data['info']) && is_array($data['info']) && isset($data['type'])) {
        $type = $data['type'];
        $alertClass = '';
        $icon = '';
        switch ($type) {
            case 'INSERT':
                $alertClass = 'alert-success';
                $icon = 'fa-check-circle';
                $message = 'Género - ' . htmlspecialchars($data['info']['nome']) . ' - inserido com sucesso.';
                break;
            case 'UPDATE':
                $alertClass = 'alert-info';
                $icon = 'fa-edit';
                $message = 'A informação do género - ' . htmlspecialchars($data['info']['nome']) . ' - foi atualizada.';
                break;
            case 'DELETE':
                $alertClass = 'alert-warning';
                $icon = 'fa-trash-alt';
                $message = 'O género - ' . htmlspecialchars($data['info']['nome']) . ' - foi eliminado.';
                break;
        }
        echo "<div class='alert $alertClass' role='alert'>";
        echo "<i class='fas $icon me-2'></i>$message";
        echo "</div>";
    }
    ?>

    <?php if (isset($data['generos']) && is_array($data['generos']) && count($data['generos']) > 0): ?>
        <div class="row">
            <?php foreach ($data['generos'] as $genero): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($genero['nome']); ?></h5>
                            <div class="btn-group" role="group">
                                <a href="<?php echo $url_alias; ?>/genero/get/<?php echo $genero['id_genero']; ?>"
                                    class="btn btn-primary">
                                    <i class="fas fa-eye me-1"></i>Ver
                                </a>
                                <a href="<?php echo $url_alias; ?>/genero/update/<?php echo $genero['id_genero']; ?>"
                                    class="btn btn-warning">
                                    <i class="fas fa-edit me-1"></i>Editar
                                </a>
                                <a href="<?php echo $url_alias; ?>/genero/delete/<?php echo $genero['id_genero']; ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('Tem certeza que deseja eliminar este género?');">
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
            <i class="fas fa-info-circle me-2"></i>Nenhum género encontrado.
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/partials/footer.php'; ?>