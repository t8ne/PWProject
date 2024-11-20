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
                    "title" => "@Meh",
                    "image" => "img-meh",
                    "text" => "@Meh foi um single lançado pelo artista Playboi Carti em 16 de abril de 2020 para o seu álbum Whole Lotta Red. Esta música foi recebida com um feedback muito diferente com os fãs a não gostarem da nova voz do artista."
                ],
                [
                    "title" => "Mallwhore Freestyle",
                    "image" => "img-mallwhore",
                    "text" => "Mallwhore Freestyle é uma das músicas mais populares do álbum Icedancer do artista Bladee. Esta música apresenta um beat mais relaxado juntamente com a sua melodia calma e o artista a usar o autotune na perfeição para criar uma das melhores músicas do mesmo."
                ],
                [
                    "title" => "The Whole World is Free",
                    "image" => "img-osama",
                    "text" => "The Whole World is Free é um single do artista Osamason produzido por WeGonBeOK em 2024. Este single foi primeiramente lançado no Soundcloud e só depois no Youtube e Spotify. A produção apresenta um sample de uma das músicas do artista Skrillex, e é um dos singles do seu próximo albúm."
                ],
                [
                    "title" => "F*ck Swag",
                    "image" => "img-fckswag",
                    "text" => "A música F*ck Swag do artista Nettspend é um single do álbum pendente BAFK. É produzido pelo produtor WeGonBeOK e é uma música que mostra a cadência e adaptabilidade do jovem artista de 17 anos."
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