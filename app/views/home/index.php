<?php include 'app/views/partials/header.php'; ?>

<link rel="stylesheet" href="/PWProject/assets/css/style.css">

<div class="jumbotron text-center" style="background-color: #ffffff; color: #000000;">
  <h1 class="display-4">Sound808</h1>
  <p class="lead">Explore o mundo da música através de artistas, géneros, álbuns e produtores.</p>
</div>

<div class="row">
  <!-- Cartão Artistas -->
  <div class="col-md-4 mb-4">
    <div class="card h-100">
      <div class="card-body text-center">
        <i class="fas fa-user fa-3x mb-3 text-primary"></i>
        <h5 class="card-title">Artistas</h5>
        <p class="card-text">Descubra os talentos por trás da música.</p>
        <a href="<?php echo $url_alias; ?>/artista" class="btn btn-primary">Ver Artistas</a>
      </div>
    </div>
  </div>

  <!-- Cartão Géneros -->
  <div class="col-md-4 mb-4">
    <div class="card h-100">
      <div class="card-body text-center">
        <i class="fa-solid fa-headphones-simple fa-3x mb-3 text-success"></i>
        <h5 class="card-title">Géneros</h5>
        <p class="card-text">Explore os diferentes estilos musicais.</p>
        <a href="<?php echo $url_alias; ?>/genero" class="btn btn-success">Ver Géneros</a>
      </div>
    </div>
  </div>

  <!-- Cartão Álbuns -->
  <div class="col-md-4 mb-4">
    <div class="card h-100">
      <div class="card-body text-center">
        <i class="fas fa-compact-disc fa-3x mb-3 text-info"></i>
        <h5 class="card-title">Álbuns</h5>
        <p class="card-text">Navegue pela coleção de álbuns.</p>
        <a href="<?php echo $url_alias; ?>/album" class="btn btn-info">Ver Álbuns</a>
      </div>
    </div>
  </div>

  <!-- Cartão Músicas -->
  <div class="col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body text-center">
        <i class="fas fa-music fa-3x mb-3 text-warning"></i>
        <h5 class="card-title">Músicas</h5>
        <p class="card-text">Encontra as músicas que os álbuns possuem.</p>
        <a href="<?php echo $url_alias; ?>/musica" class="btn btn-warning">Ver Músicas</a>
      </div>
    </div>
  </div>

  <!-- Cartão Produtores -->
  <div class="col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body text-center">
        <i class="fas fa-sliders-h fa-3x mb-3 text-danger"></i>
        <h5 class="card-title">Produtores</h5>
        <p class="card-text">Conheça os produtores por trás dos grandes hits.</p>
        <a href="<?php echo $url_alias; ?>/produtor" class="btn btn-danger">Ver Produtores</a>
      </div>
    </div>
  </div>
</div>

<?php include 'app/views/partials/footer.php'; ?>