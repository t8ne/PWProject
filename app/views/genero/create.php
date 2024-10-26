<h2>Criar Novo Género</h2>

<form action="<?php echo $url_alias; ?>/genero/create" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required><br>

    <label for="id_album">Álbum:</label>
    <select id="id_album" name="id_album" required>
        <?php foreach ($data['albums'] as $album) { ?>
            <option value="<?php echo $album['id_album']; ?>"><?php echo $album['nome']; ?></option>
        <?php } ?>
    </select><br>

    <button type="submit">Criar Género</button>
</form>
<a href="<?php echo $url_alias; ?>/genero">Voltar</a>