<h2>Lista de Produtores</h2>
<a href="<?php echo $url_alias; ?>/produtor/create">NOVO</a>

<?php
if (isset($data['info']) && isset($data['type'])) {
    $type = $data['type'];
    $info = $data['info'];
    if (is_array($info) && isset($info['nome'])) {
        switch ($type) {
            case 'INSERT':
                echo '<h3>Produtor - ' . htmlspecialchars($info['nome']) . ' - inserido com sucesso.</h3>';
                break;
            case 'UPDATE':
                echo '<h3>A informação do produtor - ' . htmlspecialchars($info['nome']) . ' - foi atualizada.</h3>';
                break;
            case 'DELETE':
                echo '<h3>O produtor - ' . htmlspecialchars($info['nome']) . ' - foi eliminado.</h3>';
                break;
        }
    }
}
?>

<ul>
    <?php
    if (isset($data['produtores']) && is_array($data['produtores'])) {
        foreach ($data['produtores'] as $produtor) {
            if (is_array($produtor) && isset($produtor['id_produtor'], $produtor['nome'])) {
                ?>
                <li>
                    <strong><?php echo htmlspecialchars($produtor['nome']); ?></strong>
                    <a href="<?php echo $url_alias; ?>/produtor/get/<?php echo $produtor['id_produtor']; ?>">Ver +</a> |
                    <a href="<?php echo $url_alias; ?>/produtor/update/<?php echo $produtor['id_produtor']; ?>">Editar</a> |
                    <a href="<?php echo $url_alias; ?>/produtor/delete/<?php echo $produtor['id_produtor']; ?>">Eliminar</a>
                </li>
            <?php
            }
        }
    } else {
        echo '<li>Nenhum produtor encontrado.</li>';
    }
    ?>
</ul>