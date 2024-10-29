<?php
// debug
// print_r($data);
?>

<h2>Editar Género</h2>
<form action="<?php echo $url_alias; ?>/genero/update/<?php echo $data['genero'][0]['id_genero']; ?>" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo $data['genero'][0]['nome']; ?>" required><br>

    <button type="submit">Atualizar Género</button>
</form>
<a href="<?php echo $url_alias; ?>/genero">Voltar</a>