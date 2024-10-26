<h2>Lista de Músicas</h2>
<a href="<?php echo $url_alias; ?>/musica/create">NOVO</a>

<?php
// debug
//print_r($data);

if (isset($data['info']) && isset($data['type'])) {
    $type = $data['type'];
    switch ($type) {
        case 'INSERT':
            echo '<h3>Música - ' . $data['info']['nome'] . ' - inserida com sucesso.</h3>';
            break;
        case 'UPDATE':
            echo '<h3>A informação da música - ' . $data['info']['nome'] . ' - foi atualizada.</h3>';
            break;
        case 'DELETE':
            echo '<h3>A música - ' . $data['info']['nome'] . ' - foi eliminada.</h3>';
            break;
    }
}
?>

<ul>
    <?php foreach ($data['musicas'] as $musica) { ?>
        <li>
            <strong><?php echo $musica['nome']; ?></strong>
            <a href="<?php echo $url_alias; ?>/musica/get/<?php echo $musica['id_musica']; ?>">Ver +</a> |
            <a href="<?php echo $url_alias; ?>/musica/update/<?php echo $musica['id_musica']; ?>">Editar</a> |
            <a href="<?php echo $url_alias; ?>/musica/delete/<?php echo $musica['id_musica']; ?>">Eliminar</a>
        </li>
    <?php } ?>
</ul>