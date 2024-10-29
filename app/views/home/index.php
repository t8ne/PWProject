<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="icon" type="image/x-icon" href="/assets/icon/favicon.ico" /> -->

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Projeto PW</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Home</h1>
        <h2>Artistas</h2>
        <a href="<?php echo $url_alias; ?>/artista">Lista de Artistas</a><br>

        <h2>Géneros</h2>
        <a href="<?php echo $url_alias; ?>/genero">Lista de Géneros</a><br>

        <h2>Álbuns</h2>
        <a href="<?php echo $url_alias; ?>/album">Lista de Álbuns</a><br>

        <h2>Músicas</h2>
        <a href="<?php echo $url_alias; ?>/musica">Lista de Músicas</a><br>

        <h2>Produtores</h2>
        <a href="<?php echo $url_alias; ?>/produtor">Lista de Produtores</a><br>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>