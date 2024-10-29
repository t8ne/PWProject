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
        <p>Não existem músicas associadas a este produtor.</p>
    <?php endif; ?>
<?php

}
?>
<a href="<?php echo htmlspecialchars($url_alias ?? ''); ?>/produtor">Voltar</a>