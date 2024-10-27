<?php
if (empty($data['album'])) {
    ?>
    <h1>O álbum não existe na nossa base de dados...</h1>
    <?php
} else {
    ?>
    <div>
        <strong>Nome:</strong> <?php echo htmlspecialchars($data['album'][0]['nome']); ?>
    </div>
    <div>
        <strong>Data:</strong> <?php echo htmlspecialchars($data['album'][0]['data']); ?>
    </div>
    <?php
}
?>
<a href="<?php echo $url_alias; ?>/album">Voltar</a>