<h2>Criar Novo Produtor</h2>

<form action="<?php echo $url_alias; ?>/produtor/create" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required><br>

    <label for="nacionalidade">Nacionalidade:</label>
    <input type="text" id="nacionalidade" name="nacionalidade" required><br>

    <button type="submit">Criar Produtor</button>
</form>
<a href="<?php echo $url_alias; ?>/produtor">Voltar</a>