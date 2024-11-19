<?php include 'app/views/partials/header.php'; ?>

<div class="container">
    <h2 class="mb-4" style="text-align: center">Artistas Criados</h2>

    <?php if ($isAdmin): ?>
        <div class="mb-3">
            <a href="<?php echo $url_alias; ?>/artista/create" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Novo Artista
            </a>
        </div>
    <?php endif; ?>

    <?php
    // Exibir mensagem de ação de artista (inserção, atualização, exclusão)
    if (isset($data['info']) && is_array($data['info']) && isset($data['type'])) {
        $type = $data['type'];
        $alertClass = '';
        $icon = '';
        switch ($type) {
            case 'INSERT':
                $alertClass = 'alert-success';
                $icon = 'fa-check-circle';
                $message = 'Artista - ' . htmlspecialchars($data['info']['nome']) . ' - inserido com sucesso.';
                break;
            case 'UPDATE':
                $alertClass = 'alert-info';
                $icon = 'fa-edit';
                $message = 'A informação do artista - ' . htmlspecialchars($data['info']['nome']) . ' - foi atualizada.';
                break;
            case 'DELETE':
                $alertClass = 'alert-warning';
                $icon = 'fa-trash-alt';
                $message = 'O artista - ' . htmlspecialchars($data['info']['nome']) . ' - foi eliminado.';
                break;
        }
        echo "<div class='alert $alertClass' role='alert'>";
        echo "<i class='fas $icon me-2'></i>$message";
        echo "</div>";
    }

    // Ordenar artistas com base na seleção do usuário
    if (isset($data['artistas']) && is_array($data['artistas']) && !empty($data['artistas'])) {
        if (isset($_GET['ordem']) && $_GET['ordem'] === 'desc') {
            // Ordem decrescente (Z-A)
            usort($data['artistas'], function ($a, $b) {
                return strcmp($b['nome'], $a['nome']);
            });
        } else {
            // Ordem crescente (A-Z, padrão)
            usort($data['artistas'], function ($a, $b) {
                return strcmp($a['nome'], $b['nome']);
            });
        }
    }
    ?>

    <?php if (isset($data['artistas']) && is_array($data['artistas']) && !empty($data['artistas'])): ?>
        <form method="GET" class="mb-4">
            <label for="ordem" class="form-label">Ordenar por:</label>
            <select name="ordem" id="ordem" class="form-select" onchange="this.form.submit()">
                <option value="asc" <?php echo (isset($_GET['ordem']) && $_GET['ordem'] == 'asc') ? 'selected' : ''; ?>>A-Z
                </option>
            </select>
        </form>
        <div class="row">
            <?php foreach ($data['artistas'] as $artist): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($artist['nome']); ?></h5>
                            <div class="btn-group" role="group">
                                <a href="<?php echo $url_alias; ?>/artista/get/<?php echo $artist['id_artista']; ?>"
                                    class="btn btn-primary">
                                    <i class="fas fa-eye me-1"></i>Ver
                                </a>
                                <?php if ($isAdmin): ?>
                                    <a href="<?php echo $url_alias; ?>/artista/update/<?php echo $artist['id_artista']; ?>"
                                        class="btn btn-warning">
                                        <i class="fas fa-edit me-1"></i>Editar
                                    </a>
                                    <a href="<?php echo $url_alias; ?>/artista/delete/<?php echo $artist['id_artista']; ?>"
                                        class="btn btn-danger"
                                        onclick="return confirm('Tem certeza que deseja eliminar este artista?');">
                                        <i class="fas fa-trash-alt me-1"></i>Eliminar
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info" role="alert">
            <i class="fas fa-info-circle me-2"></i>Nenhum artista encontrado.
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/partials/footer.php'; ?>