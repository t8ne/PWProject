<?php include 'app/views/partials/header.php'; ?>

<link rel="stylesheet" href="/PWProject/assets/css/style.css">

<div class="container">
    <div class="container">
        <h2 class="mb-4 text-center">
            <span class="bg-light rounded shadow p-2 text-dark">Álbuns Populares</span>
        </h2>
        <div class="row">
            <?php
            // Gêneros estáticos e dinâmicos
            $cards = [
                [
                    "title" => "Eternal Atake",
                    "image" => "img-eternal",
                    "text" => "Eternal Atake é o segundo álbum do artista Lil Uzi Vert. Foi lançado no ano de 2020, e é considerado dos melhores álbuns de trap desta geração. O artista consegue com uma grande produção nas suas músicas captar a ambientação que a capa do álbum promete, vendendo 286 mil cópias na primeira semana."
                ],
                [
                    "title" => "Starz",
                    "image" => "img-yunglean",
                    "text" => "Starz do artista Yung Lean é um álbum diferente dos seus predecessores, no ponto de vista de estilo de música. Yung Lean no início da década de 2010 era conhecido por um dos pioneiros de Cloud Rap sendo um dos que ajudou a levar o Rap para outros patamares. No ano de 2020 lança o álbum Starz que apresenta uma descontração e produção mais calma."
                ],
                [
                    "title" => "Cold Visions",
                    "image" => "img-bladee",
                    "text" => "Cold Visions lançado em 2023, é o último álbum lançado do artista sueco Bladee até à data. Este álbum foi extremamente bem recebido pelos seus fãs. Sonicamente é um álbum que apresenta um Bladee mais agressivo optando pelos sons de Rage Rap sob a produção de WakeupF1lthy."
                ],
                [
                    "title" => "Unknown Pleasures",
                    "image" => "img-joydivision",
                    "text" => "Unknown Pleasures é o primeiro de dois álbuns lançado pela banda Joy Division em 1979. Este álbum é considerado por muitos como icónico visto que foi dos primeiros álbuns a introduzir o post punk na Inglaterra. Sonicamente é um álbum com instrumentais e letras melancólicas e até suicidas que infelizmente se tornaram verdade após o suícidio do vocalista Ian Curtis."
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
                $message = 'Álbum - ' . htmlspecialchars($data['info']['nome']) . ' - inserido com sucesso.';
                break;
            case 'UPDATE':
                $alertClass = 'alert-info';
                $icon = 'fa-edit';
                $message = 'A informação do álbum - ' . htmlspecialchars($data['info']['nome']) . ' - foi atualizada.';
                break;
            case 'DELETE':
                $alertClass = 'alert-warning';
                $icon = 'fa-trash-alt';
                $message = 'O álbum - ' . htmlspecialchars($data['info']['nome']) . ' - foi eliminado.';
                break;
        }
        echo "<div class='alert $alertClass' role='alert'>";
        echo "<i class='fas $icon me-2'></i>$message";
        echo "</div>";
    }
    ?>
</div>

<h2 class="mb-4 text-center">
    <span class="bg-light rounded shadow p-2 text-dark">Álbuns Criados</span>
</h2>

<?php if ($isAdmin): ?>
    <div class="mb-3">
        <a href="<?php echo $url_alias; ?>/album/create" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i>Novo Álbum
        </a>
    </div>
<?php endif; ?>

<?php if (isset($data['albuns']) && is_array($data['albuns']) && !empty($data['albuns'])): ?>
    <form method="GET" class="mb-4" action="<?php echo $url_alias; ?>/album">
        <label for="ordem" class="form-label">Ordenar por:</label>
        <select name="ordem" id="ordem" class="form-select" onchange="this.form.submit()">
            <option value="asc" <?php echo (isset($data['ordem']) && $data['ordem'] == 'asc') ? 'selected' : ''; ?>>A-Z
            </option>
            <option value="desc" <?php echo (isset($data['ordem']) && $data['ordem'] == 'desc') ? 'selected' : ''; ?>>Z-A
            </option>
        </select>
    </form>
    <div class="row">
        <?php foreach ($data['albuns'] as $album): ?>
            <?php if (is_array($album) && isset($album['id_album'], $album['nome'])): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($album['nome']); ?></h5>
                            <div class="btn-group" role="group">
                                <a href="<?php echo $url_alias; ?>/album/get/<?php echo $album['id_album']; ?>"
                                    class="btn btn-primary">
                                    <i class="fas fa-eye me-1"></i>Ver
                                </a>
                                <?php if ($isAdmin): ?>
                                    <a href="<?php echo $url_alias; ?>/album/update/<?php echo $album['id_album']; ?>"
                                        class="btn btn-warning">
                                        <i class="fas fa-edit me-1"></i>Editar
                                    </a>
                                    <a href="<?php echo $url_alias; ?>/album/delete/<?php echo $album['id_album']; ?>"
                                        class="btn btn-danger"
                                        onclick="return confirm('Tem a certeza que deseja eliminar este álbum?');">
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
        <i class="fas fa-info-circle me-2"></i>Nenhum álbum encontrado.
    </div>
<?php endif; ?>
</div>

<?php include 'app/views/partials/footer.php'; ?>