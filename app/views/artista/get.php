<?php
// Verifica se `artista` está definido e tem dados
if (isset($data['artista']) && is_array($data['artista']) && count($data['artista']) > 0) {
    ?>
    <div>
        <?php
        echo "Nome: " . htmlspecialchars($data['artista'][0]['nome']);
        ?>
    </div>

    <div>
        <?php
        echo "Nacionalidade: " . (isset($data['artista']['nacionalidade']) ? htmlspecialchars($data['artista']['nacionalidade']) : "N/A");
        ?>
    </div>
    <?php
} else {
    ?>
    <h1>O artista não existe na nossa base de dados...</h1>
    <?php
}
?>
<a href="<?php echo $url_alias; ?>/artista">Voltar</a>