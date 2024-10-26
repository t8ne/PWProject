<?php
// debug
// print_r($data);
?>

<h2>Editar Produtor</h2>
<form action="<?php echo $url_alias; ?>/produtor/update/<?php echo $data['producer'][0]['id_produtor']; ?>" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo $data['producer'][0]['nome']; ?>" required><br>

    <label for="nacionalidade">Nacionalidade:</label>
    <input type="text" id="nacionalidade" name="nacionalidade"
        value="<?php echo $data['producer'][0]['nacionalidade']; ?>" required><br>

    <button type="submit">Atualizar Produtor</button>
</form>
<a href="<?php echo $url_alias; ?>/produtor">Voltar</a>