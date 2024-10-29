<h2>Criar Música</h2>
<form action="<?php echo $url_alias; ?>/musica/create" method="post">
    <label for="nome">Nome da Música</label>
    <input type="text" name="nome" value="<?php echo htmlspecialchars($data['musica']['nome'] ?? ''); ?>" required>

    <label for="tempo">Tempo</label>
    <input type="number" name="tempo" step="0.01"
        value="<?php echo htmlspecialchars($data['musica']['tempo'] ?? ''); ?>" required>

    <label for="album">Álbum:</label>
    <select name="id_album" required>
        <?php foreach ($data['albums'] as $album): ?>
            <option value="<?php echo $album['id_album']; ?>" <?php echo (isset($data['musica']['id_album']) && $data['musica']['id_album'] == $album['id_album']) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($album['nome']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="produtor">Produtor:</label>
    <select name="id_produtor" required>
        <?php foreach ($data['produtores'] as $produtor): ?>
            <option value="<?php echo $produtor['id_produtor']; ?>" <?php echo (isset($data['musica']['id_produtor']) && $data['musica']['id_produtor'] == $produtor['id_produtor']) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($produtor['nome']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Salvar</button>
</form>