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
    <div>
        <strong>Álbum:</strong> <?php echo htmlspecialchars($data['musica'][0]['id_album']); ?>
    </div>
    <div>
        <strong>Produtor:</strong>
        <?php
        // Verifica se id_produtor é NULL
        if (is_null($data['musica'][0]['id_produtor'])) {
            echo "Produtor eliminado.";
        } else {
            // Se não for NULL, exibe o ID do produtor normalmente
            echo htmlspecialchars($data['musica'][0]['id_produtor']);
        }
        ?>
    </div>
    <?php
}
?>
<a href="<?php echo $url_alias; ?>/musica">Voltar</a>