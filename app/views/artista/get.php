<?php
// Verifica se `artista` está definido e tem dados
if (isset($data['artista']) && is_array($data['artista']) && !empty($data['artista'])) {
    $artista = $data['artista'];
    ?>
    <div>
        <?php
        echo "Nome: " . htmlspecialchars($artista['nome'] ?? '');
        ?>
    </div>

    <div>
        <?php
        echo "Nacionalidade: " . htmlspecialchars($artista['nacionalidade'] ?? 'N/A');
        ?>
    </div>
    <?php
} else {
    ?>
    <h1>O artista não existe na nossa base de dados...</h1>
    <?php
}
?>
<a href="<?php echo htmlspecialchars($url_alias ?? ''); ?>/artista">Voltar</a>