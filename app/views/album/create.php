<h2>Criar/Editar Album</h2>
<form action="<?php echo $url_alias; ?>/album/create" method="post">
    <label for="nome">Nome do Album:</label>
    <input type="text" name="nome" value="<?php echo htmlspecialchars($data['album']['nome'] ?? ''); ?>" required>

    <label for="data">Data:</label>
    <input type="date" name="data" value="<?php echo htmlspecialchars($data['album']['data'] ?? ''); ?>" required>

    <label for="genero">Gênero:</label>
    <select name="id_genero" required>
        <?php foreach ($data['generos'] as $genero): ?>
            <option value="<?php echo $genero['id_genero']; ?>" <?php echo (isset($data['album']['id_genero']) && $data['album']['id_genero'] == $genero['id_genero']) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($genero['nome']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="artista">Artista:</label>
    <select name="id_artista" required>
        <?php foreach ($data['artistas'] as $artista): ?>
            <option value="<?php echo $artista['id_artista']; ?>" <?php echo (isset($data['album']['id_artista']) && $data['album']['id_artista'] == $artista['id_artista']) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($artista['nome']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Salvar</button>
</form>