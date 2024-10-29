<h2>Editar Álbum</h2>
<form action="<?php echo $url_alias; ?>/album/update/<?php echo $data['album'][0]['id_album']; ?>" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($data['album'][0]['nome']); ?>"
        required><br>

    <label for="data">Data:</label>
    <input type="date" id="data" name="data" value="<?php echo htmlspecialchars($data['album'][0]['data']); ?>"
        required><br>

    <label for="id_artista">Artista:</label>
    <select id="id_artista" name="id_artista" required>
        <?php foreach ($data['artistas'] as $artista): ?>
            <option value="<?php echo $artista['id_artista']; ?>" <?php if ($artista['id_artista'] == $data['album'][0]['id_artista'])
                   echo 'selected'; ?>>
                <?php echo htmlspecialchars($artista['nome']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="id_genero">Género:</label>
    <select id="id_genero" name="id_genero" required>
        <?php foreach ($data['generos'] as $genero): ?>
            <option value="<?php echo $genero['id_genero']; ?>" <?php if ($genero['id_genero'] == $data['album'][0]['id_genero'])
                   echo 'selected'; ?>>
                <?php echo htmlspecialchars($artista['nome']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Atualizar Álbum</button>
</form>
<a href="<?php echo $url_alias; ?>/album">Voltar</a>