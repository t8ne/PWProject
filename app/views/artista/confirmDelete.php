<div>
    <p><?php echo htmlspecialchars($data['info']); ?></p>
    <a href="<?php echo $url_alias; ?>/artista/deleteWithAlbums/<?php echo $data['artista_id']; ?>">Sim, excluir
        tudo</a>
    <a href="<?php echo $url_alias; ?>/artista">Não, cancelar</a>
</div>