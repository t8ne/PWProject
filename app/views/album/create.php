<h2>Criar Novo Álbum</h2>

<form action="<?php echo $url_alias; ?>/album/create" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required><br>

    <label for="data">Data:</label>
    <input type="date" id="data" name="data" required><br>

    <label for="id_artista">Artista:</label>
    <select id="id_artista" name="id_artista" required>
        <?php foreach ($data['artistas'] as $artista): ?>
            <option value="<?php echo $artista['id_artista']; ?>"><?php echo $artista['nome']; ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Criar Álbum</button>
</form>
<a href="<?php echo $url_alias; ?>/album">Voltar</a>