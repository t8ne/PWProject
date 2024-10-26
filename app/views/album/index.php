<h2>Lista de Álbuns</h2>
<a href="<?php echo $url_alias; ?>/album/create">NOVO</a>

<?php
// debug
//print_r($data);

if (isset($data['info']) && isset($data['type'])) {
    $type = $data['type'];
    switch ($type) {
        case 'INSERT':
            echo '<h3>Álbum - ' . $data['info']['nome'] . ' - inserido com sucesso.</h3>';
            break;
        case 'UPDATE':
            echo '<h3>A informação do álbum - ' . $data['info']['nome'] . ' - foi atualizada.</h3>';
            break;
        case 'DELETE':
            echo '<h3>O álbum - ' . $data['info']['nome'] . ' - foi eliminado.</h3>';
            break;
    }
}
?>

<ul>
    <?php foreach ($data['albums'] as $album) { ?>
        <li>
            <strong><?php echo $album['nome']; ?></strong>
            <a href="<?php echo $url_alias; ?>/album/get/<?php echo $album['id_album']; ?>">Ver +</a> |
            <a href="<?php echo $url_alias; ?>/album/update/<?php echo $album['id_album']; ?>">Editar</a> |
            <a href="<?php echo $url_alias; ?>/album/delete/<?php echo $album['id_album']; ?>">Eliminar</a>
        </li>
    <?php } ?>
</ul>