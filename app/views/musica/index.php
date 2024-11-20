<?php include 'app/views/partials/header.php'; ?>

<link rel="stylesheet" href="/PWProject/assets/css/style.css">

<div class="container">
    <div class="container">
        <h2 class="mb-4 text-center">
            <span class="bg-light rounded shadow p-2 text-dark">Músicas Populares</span>
        </h2>
        <div class="row">
            <?php
            // Gêneros estáticos e dinâmicos
            $cards = [
                [
                    "title" => "Rock",
                    "image" => "img-osama",
                    "text" => "O rock é um género musical que surgiu nos anos 1950, misturando blues e R&B. É conhecido pelo uso da guitarra elétrica e letras sobre liberdade e rebeldia. Influenciou diversos estilos e gerações."
                ],
                [
                    "title" => "Mallwhore Freestyle",
                    "image" => "imgs-mallwhore",
                    "text" => "O jazz é um género musical caracterizado pela improvisação e variação rítmica. Originou no final do século XIX e influenciou diversos outros géneros musicais."
                ],
                [
                    "title" => "Pop",
                    "image" => "imgs/fckswag.png",
                    "text" => "O pop é um género musical popular conhecido pelo seu apelo mainstream, melodias cativantes e foco em vocais e produção."
                ],
                [
                    "title" => "Trap",
                    "image" => "img-trap",
                    "text" => "O Trap é um subgénero do hip-hop que surgiu no sul dos Estados Unidos nos anos 2000. É caracterizado por batidas pesadas e presença de 808s, além de letras que exploram temas urbanos."
                ],
            ];


            // Exibir cada card na grid
            foreach ($cards as $card) {
                echo '
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card" style="width: 100%;">
                        <div class="card-img-top ' . htmlspecialchars($card["image"]) . '" style="height: 200px;"></div>
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($card["title"]) . '</h5>
                            <p class="card-text">' . htmlspecialchars($card["text"]) . '</p>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>

    <?php
    if (isset($data['info']) && is_array($data['info']) && isset($data['type'])) {
        $type = $data['type'];
        $alertClass = '';
        $icon = '';
        switch ($type) {
            case 'INSERT':
                $alertClass = 'alert-success';
                $icon = 'fa-check-circle';
                $message = 'Música - ' . htmlspecialchars($data['info']['nome']) . ' - inserido com sucesso.';
                break;
            case 'UPDATE':
                $alertClass = 'alert-info';
                $icon = 'fa-edit';
                $message = 'A informação da música - ' . htmlspecialchars($data['info']['nome']) . ' - foi atualizada.';
                break;
            case 'DELETE':
                $alertClass = 'alert-warning';
                $icon = 'fa-trash-alt';
                $message = 'A música - ' . htmlspecialchars($data['info']['nome']) . ' - foi eliminada.';
                break;
        }
        echo "<div class='alert $alertClass' role='alert'>";
        echo "<i class='fas $icon me-2'></i>$message";
        echo "</div>";
    }
    ?>
</div>

<h2 class="mb-4 text-center">
    <span class="bg-light rounded shadow p-2 text-dark">Músicas Criadas</span>
</h2>

<?php if ($isAdmin): ?>
    <div class="mb-3">
        <a href="<?php echo $url_alias; ?>/musica/create" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i>Nova Música
        </a>
    </div>
<?php endif; ?>

<?php if (isset($data['musicas']) && is_array($data['musicas']) && !empty($data['musicas'])): ?>
    <form method="GET" class="mb-4" action="<?php echo $url_alias; ?>/musica">
        <label for="ordem" class="form-label">Ordenar por:</label>
        <select name="ordem" id="ordem" class="form-select" onchange="this.form.submit()">
            <option value="asc" <?php echo (isset($data['ordem']) && $data['ordem'] == 'asc') ? 'selected' : ''; ?>>A-Z
            </option>
            <option value="desc" <?php echo (isset($data['ordem']) && $data['ordem'] == 'desc') ? 'selected' : ''; ?>>Z-A
            </option>
        </select>
    </form>
    <div class="row">
        <?php foreach ($data['musicas'] as $musica): ?>
            <?php if (is_array($musica) && isset($musica['id_musica'], $musica['nome'])): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($musica['nome']); ?></h5>
                            <div class="btn-group" role="group">
                                <a href="<?php echo $url_alias; ?>/musica/get/<?php echo $musica['id_musica']; ?>"
                                    class="btn btn-primary">
                                    <i class="fas fa-eye me-1"></i>Ver
                                </a>
                                <?php if ($isAdmin): ?>
                                    <a href="<?php echo $url_alias; ?>/musica/update/<?php echo $musica['id_musica']; ?>"
                                        class="btn btn-warning">
                                        <i class="fas fa-edit me-1"></i>Editar
                                    </a>
                                    <a href="<?php echo $url_alias; ?>/musica/delete/<?php echo $musica['id_musica']; ?>"
                                        class="btn btn-danger"
                                        onclick="return confirm('Tem a certeza que deseja eliminar este música?');">
                                        <i class="fas fa-trash-alt me-1"></i>Eliminar
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="alert alert-info" role="alert">
        <i class="fas fa-info-circle me-2"></i>Nenhuma música encontrada.
    </div>
<?php endif; ?>
</div>

<?php include 'app/views/partials/footer.php'; ?>