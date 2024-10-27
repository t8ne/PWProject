<?php
if (empty($data['genero'])) { // Check if the genre data is empty
    ?>
    <h1>O género não existe na nossa base de dados...</h1>
    <?php
} else {
    ?>
    <div>
        <strong>Nome:</strong> <?php echo htmlspecialchars($data['genero'][0]['nome']); ?>
    </div>
    <div>
        <strong>Álbum:</strong> <?php echo htmlspecialchars($data['genero'][0]['id_album']); ?>
    </div>
    <?php
}
?>
<a href="<?php echo $url_alias; ?>/genero">Voltar</a>