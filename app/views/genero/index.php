<h2>Lista de Géneros</h2>
<a href="<?php echo $url_alias; ?>/genero/create">NOVO</a>

<?php
// debug
//print_r($data);

if (isset($data['info']) && isset($data['type'])) {
    $type = $data['type'];
    switch ($type) {
        case 'INSERT':
            echo '<h3>Género - ' . $data['info']['nome'] . ' - inserido com sucesso.</h3>';
            break;
        case 'UPDATE':
            echo '<h3>A informação do género - ' . $data['info']['nome'] . ' - foi atualizada.</h3>';
            break;
        case 'DELETE':
            echo '<h3>O género - ' . $data['info']['nome'] . ' - foi eliminado.</h3>';
            break;
    }
}
?>

<ul>
    <?php foreach ($data['generos'] as $genero) { ?>
        <li>
            <strong><?php echo $genero['nome']; ?></strong>
            <a href="<?php echo $url_alias; ?>/genero/get/<?php echo $genero['id_genero']; ?>">Ver +</a> |
            <a href="<?php echo $url_alias; ?>/genero/update/<?php echo $genero['id_genero']; ?>">Editar</a> |
            <a href="<?php echo $url_alias; ?>/genero/delete/<?php echo $genero['id_genero']; ?>">Eliminar</a>
        </li>
    <?php } ?>
</ul>