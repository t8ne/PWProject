<?php
// debug
// print_r($data);
?>

<h2>Editar Artista</h2>
<form
    action="<?php echo htmlspecialchars($url_alias ?? ''); ?>/artista/update/<?php echo htmlspecialchars($data['artist']['id_artista'] ?? ''); ?>"
    method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($data['artist']['nome'] ?? ''); ?>"
        required><br>

    <label for="nacionalidade">Nacionalidade:</label>
    <input type="text" id="nacionalidade" name="nacionalidade"
        value="<?php echo htmlspecialchars($data['artist']['nacionalidade'] ?? ''); ?>" required><br>

    <button type="submit">Atualizar Artista</button>
</form>
<a href="<?php echo htmlspecialchars($url_alias ?? ''); ?>/artista">Voltar</a>