<div>
    <p><?php echo htmlspecialchars($data['info']); ?></p>
    <a href="<?php echo $url_alias; ?>/album/deleteWithMusicas/<?php echo $data['album_id']; ?>">Sim, excluir tudo</a>
    <a href="<?php echo $url_alias; ?>/album">Não, cancelar</a>
</div>