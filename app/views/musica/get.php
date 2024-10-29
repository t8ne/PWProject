<?php
if (empty($data['musica'])) {
    ?>
    <h1>A música não existe na nossa base de dados...</h1>
    <?php
} else {
    ?>
    <div>
        <strong>Nome:</strong> <?php echo htmlspecialchars($data['musica'][0]['nome']); ?>
    </div>
    <div>
        <strong>Tempo:</strong> <?php echo htmlspecialchars($data['musica'][0]['tempo']); ?>
    </div>
    <?php
}
?>
<a href="<?php echo $url_alias; ?>/musica">Voltar</a>