<h2>Lista de Álbuns</h2>
<a href="<?php echo $url_alias; ?>/album/create">NOVO</a>

<?php

?>

<ul>
    <?php if (isset($data['albums']) && is_array($data['albums'])): ?>
        <?php foreach ($data['albums'] as $album): ?>
            <li>
                <strong><?php echo htmlspecialchars($album['nome']); ?></strong>
                <a href="<?php echo $url_alias; ?>/album/get/<?php echo $album['id_album']; ?>">Ver +</a> |
                <a href="<?php echo $url_alias; ?>/album/update/<?php echo $album['id_album']; ?>">Editar</a> |
                <a href="<?php echo $url_alias; ?>/album/delete/<?php echo $album['id_album']; ?>">Eliminar</a>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>No albums found or an error occurred while retrieving albums.</li>
    <?php endif; ?>
</ul>