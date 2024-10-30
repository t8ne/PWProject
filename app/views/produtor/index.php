<?php include 'app/views/partials/header.php'; ?>

<div class="container">
    <h2 class="mb-4">Lista de Produtores</h2>

    <?php if ($isAdmin): ?>
        <div class="mb-3">
            <a href="<?php echo $url_alias; ?>/produtor/create" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Novo Produtor
            </a>
        </div>
    <?php endif; ?>

    <?php
    if (isset($data['info']) && isset($data['type'])) {
        $type = $data['type'];
        $info = $data['info'];
        if (is_array($info) && isset($info['nome'])) {
            $alertClass = '';
            $icon = '';
            switch ($type) {
                case 'INSERT':
                    $alertClass = 'alert-success';
                    $icon = 'fa-check-circle';
                    $message = 'Produtor - ' . htmlspecialchars($info['nome']) . ' - inserido com sucesso.';
                    break;
                case 'UPDATE':
                    $alertClass = 'alert-info';
                    $icon = 'fa-edit';
                    $message = 'A informação do produtor - ' . htmlspecialchars($info['nome']) . ' - foi atualizada.';
                    break;
                case 'DELETE':
                    $alertClass = 'alert-warning';
                    $icon = 'fa-trash-alt';
                    $message = 'O produtor - ' . htmlspecialchars($info['nome']) . ' - foi eliminado.';
                    break;
            }
            echo "<div class='alert $alertClass' role='alert'>";
            echo "<i class='fas $icon me-2'></i>$message";
            echo "</div>";
        }
    }
    ?>

    <?php if (isset($data['produtores']) && is_array($data['produtores']) && !empty($data['produtores'])): ?>
        <div class="row">
            <?php foreach ($data['produtores'] as $produtor): ?>
                <?php if (is_array($produtor) && isset($produtor['id_produtor'], $produtor['nome'])): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($produtor['nome']); ?></h5>
                                <div class="btn-group" role="group">
                                    <a href="<?php echo $url_alias; ?>/produtor/get/<?php echo $produtor['id_produtor']; ?>"
                                        class="btn btn-primary">
                                        <i class="fas fa-eye me-1"></i>Ver
                                    </a>
                                    <?php if ($isAdmin): ?>
                                        <a href="<?php echo $url_alias; ?>/produtor/update/<?php echo $produtor['id_produtor']; ?>"
                                            class="btn btn-warning">
                                            <i class="fas fa-edit me-1"></i>Editar
                                        </a>
                                        <a href="<?php echo $url_alias; ?>/produtor/delete/<?php echo $produtor['id_produtor']; ?>"
                                            class="btn btn-danger"
                                            onclick="return confirm('Tem certeza que deseja eliminar este produtor?');">
                                            <i class="fas fa-trash-alt me-1"></i>Eliminar
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info" role="alert">
            <i class="fas fa-info-circle me-2"></i>Nenhum produtor encontrado.
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/partials/footer.php'; ?>