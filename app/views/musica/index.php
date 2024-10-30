<?php include 'app/views/partials/header.php'; ?>

<div class="container">
    <h2 class="mb-4">Lista de Músicas</h2>

    <?php if ($isAdmin): ?>
        <div class="mb-3">
            <a href="<?php echo $url_alias; ?>/musica/create" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Nova Música
            </a>
        </div>
    <?php endif; ?>

    <?php
    if (isset($data['musica']) && isset($data['type'])) {
        $type = $data['type'];
        $alertClass = '';
        $icon = '';
        switch ($type) {
            case 'INSERT':
                $alertClass = 'alert-success';
                $icon = 'fa-check-circle';
                $message = 'Música - ' . htmlspecialchars($data['musica']['nome']) . ' - inserida com sucesso.';
                break;
            case 'UPDATE':
                $alertClass = 'alert-info';
                $icon = 'fa-edit';
                $message = 'A informação da música - ' . htmlspecialchars($data['musica']['nome']) . ' - foi atualizada.';
                break;
            case 'DELETE':
                $alertClass = 'alert-warning';
                $icon = 'fa-trash-alt';
                $message = 'A música - ' . htmlspecialchars($data['musica']['nome']) . ' - foi eliminada.';
                break;
        }
        echo "<div class='alert $alertClass' role='alert'>";
        echo "<i class='fas $icon me-2'></i>$message";
        echo "</div>";
    }
    ?>

    <?php if (isset($data['musicas']) && is_array($data['musicas']) && !empty($data['musicas'])): ?>
        <div class="row">
            <?php foreach ($data['musicas'] as $musica): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($musica['nome']); ?></h5>
                            <div class="btn-group" role="group">
                                <a href="<?php echo $url_alias; ?>/musica/get/<?php echo $musica['id_musica']; ?>"
                                    class="btn btn-primary">
                                    <i class="fas fa-eye me-1"></i>Ver
                                </a>
                                <a href="<?php echo $url_alias; ?>/musica/update/<?php echo $musica['id_musica']; ?>"
                                    class="btn btn-warning">
                                    <i class="fas fa-edit me-1"></i>Editar
                                </a>
                                <a href="<?php echo $url_alias; ?>/musica/delete/<?php echo $musica['id_musica']; ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('Tem certeza que deseja eliminar esta música?');">
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
            <i class="fas fa-info-circle me-2"></i>Nenhuma música encontrada.
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/partials/footer.php'; ?>