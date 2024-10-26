<h2>Criar Novo Álbum</h2>

<form action="<?php echo $url_alias; ?>/album/create" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required><br>

    <label for="data">Data:</label>
    <input type="date" id="data" name="data" required><br>

    <button type="submit">Criar Álbum</button>
</form>
<a href="<?php echo $url_alias; ?>/album">Voltar</a>