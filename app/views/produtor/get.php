<?php
// debug
// print_r($data);
?>

<?php
if (!isset($data['produtor']) || !is_array($data['produtor'])) {
    ?>
    <h1>O produtor não existe na nossa base de dados...</h1>
    <?php
} else {
    $produtor = $data['produtor'];
    ?>

    <div>
        <?php
        echo "Nome: " . htmlspecialchars($produtor['nome'] ?? '');
        ?>
    </div>

    <div>
        <?php
        echo "Nacionalidade: " . htmlspecialchars($produtor['nacionalidade'] ?? '');
        ?>
    </div>
    <?php
}
?>
<a href="<?php echo htmlspecialchars($url_alias ?? ''); ?>/produtor">Voltar</a>