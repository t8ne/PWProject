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
    <h3>Músicas:</h3>
    <?php if (!empty($data['musicas']) && is_array($data['musicas'])): ?>
        <ul>
            <?php foreach ($data['musicas'] as $musica): ?>
                <li>
                    <?php echo htmlspecialchars($musica['nome']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Não existem músicas associadas a este álbum.</p>
    <?php endif; ?>
<?php
}
?>
<a href="<?php echo $url_alias; ?>/album">Voltar</a>