<?php include 'app/views/partials/header.php'; ?>
<div class="container">
    <h2 class="mb-4">Lista de Artistas</h2>

    <div class="mb-3">
        <a href="<?php echo $url_alias; ?>/artista/create" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i>Novo Artista
        </a>
    </div>
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

if (isset($data['artistas']) && is_array($data['artistas'])) {
    if (count($data['artistas']) > 0) {
        echo '<div class="row">';
        foreach ($data['artistas'] as $artist) {
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($artist['nome']) . '</h5>';
            echo '<p class="card-text">ID: ' . $artist['id_artista'] . '</p>';
            echo '<div class="btn-group" role="group">';
            echo '<a href="' . $url_alias . '/artista/get/' . $artist['id_artista'] . '" class="btn btn-primary"><i class="fas fa-eye me-1"></i>Ver</a>';
            echo '<a href="' . $url_alias . '/artista/update/' . $artist['id_artista'] . '" class="btn btn-warning"><i class="fas fa-edit me-1"></i>Editar</a>';
            echo '<a href="' . $url_alias . '/artista/delete/' . $artist['id_artista'] . '" class="btn btn-danger" onclick="return confirm(\'Tem certeza que deseja eliminar este artista?\');"><i class="fas fa-trash-alt me-1"></i>Eliminar</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<div class="alert alert-info" role="alert">
        <i class="fas fa-info-circle me-2"></i>Nenhum artista encontrado.
              </div>';
    }
} else {
    echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle me-2"></i>Erro ao carregar artistas.</div>';
}
?>

<?php include 'app/views/partials/footer.php'; ?>