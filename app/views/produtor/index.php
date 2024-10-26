<h2>Lista de Produtores</h2>
<a href="<?php echo $url_alias; ?>/produtor/create">NOVO</a>

<?php
// debug
//print_r($data);

if (isset($data['info']) && isset($data['type'])) {
    $type = $data['type'];
    switch ($type) {
        case 'INSERT':
            echo '<h3>Produtor - ' . $data['info']['nome'] . ' - inserido com sucesso.</h3>';
            break;
        case 'UPDATE':
            echo '<h3>A informação do produtor - ' . $data['info']['nome'] . ' - foi atualizada.</h3>';
            break;
        case 'DELETE':
            echo '<h3>O produtor - ' . $data['info']['nome'] . ' - foi eliminado.</h3>';
            break;
    }
}
?>

<ul>
    <?php foreach ($data['producers'] as $producer) { ?>
        <li>
            <strong><?php echo $producer['nome']; ?></strong>
            <a href="<?php echo $url_alias; ?>/produtor/get/<?php echo $producer['id_produtor']; ?>">Ver +</a> |
            <a href="<?php echo $url_alias; ?>/produtor/update/<?php echo $producer['id_produtor']; ?>">Editar</a> |
            <a href="<?php echo $url_alias; ?>/produtor/delete/<?php echo $producer['id_produtor']; ?>">Eliminar</a>
        </li>
    <?php } ?>
</ul>