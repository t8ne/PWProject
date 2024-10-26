<?php
// debug
// print_r($data);
?>

<h2>Editar Álbum</h2>
<form action="<?php echo $url_alias; ?>/album/update/<?php echo $data['album'][0]['id_album']; ?>" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo $data['album'][0]['nome']; ?>" required><br>

    <label for="data">Data:</label>
    <input type="date" id="data" name="data" value="<?php echo $data['album'][0]['data']; ?>" required><br>

    <button type="submit">Atualizar Álbum</button>
</form>
<a href="<?php echo $url_alias; ?>/album">Voltar</a>