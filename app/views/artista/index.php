<h2>Lista de Artistas</h2>
<a href="<?php echo $url_alias; ?>/artista/create">NOVO</a>

<?php
// Verifica se 'info' e 'type' existem e têm valores válidos
if (isset($data['info']) && is_array($data['info']) && isset($data['type'])) {
    $type = $data['type'];
    switch ($type) {
        case 'INSERT':
            echo '<h3>Artista - ' . htmlspecialchars($data['info']['nome']) . ' - inserido com sucesso.</h3>';
            break;
        case 'UPDATE':
            echo '<h3>A informação do artista - ' . htmlspecialchars($data['info']['nome']) . ' - foi atualizada.</h3>';
            break;
        case 'DELETE':
            echo '<h3>O artista - ' . htmlspecialchars($data['info']['nome']) . ' - foi eliminado.</h3>';
            break;
    }
}

// Verifica se 'artistas' existe e é um array
if (isset($data['artistas']) && is_array($data['artistas'])) {
    if (count($data['artistas']) > 0) {
        echo '<ul>';
        foreach ($data['artistas'] as $artist) {
            echo '<li>';
            echo '<strong>' . htmlspecialchars($artist['nome']) . '</strong>';
            echo ' <a href="' . $url_alias . '/artista/get/' . $artist['id_artista'] . '">Ver +</a> | ';
            echo '<a href="' . $url_alias . '/artista/update/' . $artist['id_artista'] . '">Editar</a> | ';
            echo '<a href="' . $url_alias . '/artista/delete/' . $artist['id_artista'] . '">Eliminar</a>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>Nenhum artista encontrado.</p>';
    }
} else {
    echo '<p>Erro ao carregar artistas.</p>';
}
?>