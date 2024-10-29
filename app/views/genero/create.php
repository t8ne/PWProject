<h2>Criar Novo Género</h2>

<form action="<?php echo $url_alias; ?>/genero/create" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required><br>
    <button type="submit">Criar Género</button>
</form>
<a href="<?php echo $url_alias; ?>/genero">Voltar</a>