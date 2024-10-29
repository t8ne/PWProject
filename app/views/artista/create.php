<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Artista</title>
</head>

<body>
    <h1>Create Artista</h1>
    <form action="<?php echo $url_alias; ?>/artista/create" method="POST">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div>
            <label for="nacionalidade">Nacionalidade:</label>
            <input type="text" id="nacionalidade" name="nacionalidade" required>
        </div>
        <button type="submit">Create</button>
    </form>
    <a href="<?php echo $url_alias; ?>/artista">Back to Artista List</a>
</body>

</html>