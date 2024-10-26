<h2>Criar Nova Música</h2>

<form action="<?php echo $url_alias; ?>/musica/create" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required><br>

    <label for="id_album">Álbum:</label>
    <select id="id_album" name="id_album" required>
        <?php foreach ($data['albums'] as $album) { ?>
            <option value="<?php echo $album['id_album']; ?>"><?php echo $album['nome']; ?></option>
        <?php } ?>
    </select><br>

    <label for="id_produtor">Produtor:</label>
    <select id="id_produtor" name="id_produtor" required>
        <?php foreach ($data['producers'] as $producer) { ?>
            <option value="<?php echo $producer['id_produtor']; ?>"><?php echo $producer['nome']; ?></option>
        <?php } ?>
    </select><br>

    <button type="submit">Criar Música</button>
</form>
<a href="<?php echo $url_alias; ?>/musica">Voltar</a>