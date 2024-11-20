<?php include 'app/views/partials/header.php'; ?>

<link rel="stylesheet" href="/PWProject/assets/css/style.css">

<div class="container">
    <h2 class="mb-4" style="text-align: center">Produtores Populares</h2>
    <div class="container">
        <div class="row">
            <?php
            // Gêneros estáticos e dinâmicos
            $cards = [
                [
                    "title" => "WeGonBeOK",
                    "image" => "img-ok",
                    "text" => "William Dale Minnix III, conhecido profissionalmente como ok, é um produtor musical americano de Charlotte, Carolina do Norte."
                ],
                [
                    "title" => "Pierre Bourne",
                    "image" => "img-pierre",
                    "text" => "Produtor musical e rapper americano de Fort Riley, Kansas, é conhecido por ter produzido os singles de 2017 Magnolia de Playboi Carti e Gummo de 6ix9ine."
                ],
                [
                    "title" => "Richie Souf",
                    "image" => "img-richie",
                    "text" => "Produtor musical de hip hop certificado como platina, reconhecido pelas suas colaborações com Makonnen Sheran e MadeinTYO."
                ],
                [
                    "title" => "2hollis",
                    "image" => "img-2hollis",
                    "text" => "Cantor, rapper e produtor americano de Chicago, Illinois. Ganhou atenção pela primeira vez com o seu álbum de 2022, White Tiger. "
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
                $message = 'Género - ' . htmlspecialchars($data['info']['nome']) . ' - inserido com sucesso.';
                break;
            case 'UPDATE':
                $alertClass = 'alert-info';
                $icon = 'fa-edit';
                $message = 'A informação do género - ' . htmlspecialchars($data['info']['nome']) . ' - foi atualizada.';
                break;
            case 'DELETE':
                $alertClass = 'alert-warning';
                $icon = 'fa-trash-alt';
                $message = 'O género - ' . htmlspecialchars($data['info']['nome']) . ' - foi eliminado.';
                break;
        }
        echo "<div class='alert $alertClass' role='alert'>";
        echo "<i class='fas $icon me-2'></i>$message";
        echo "</div>";
    }
    ?>
</div>

<h2 class="mb-4" style="text-align: center">Produtores Criados</h2>

<?php if ($isAdmin): ?>
    <div class="mb-3">
        <a href="<?php echo $url_alias; ?>/produtor/create" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i>Novo Produtor
        </a>
    </div>
<?php endif; ?>


<?php if (isset($data['produtores']) && is_array($data['produtores']) && !empty($data['produtores'])): ?>
    <!-- Formulário para seleção da ordem alfabética -->
    <form method="GET" class="mb-4">
        <label for="ordem" class="form-label">Ordenar por:</label>
        <select name="ordem" id="ordem" class="form-select" onchange="this.form.submit()">
            <option value="asc" <?php echo (isset($_GET['ordem']) && $_GET['ordem'] == 'asc') ? 'selected' : ''; ?>>A-Z
            </option>
            <option value="desc" <?php echo (isset($_GET['ordem']) && $_GET['ordem'] == 'desc') ? 'selected' : ''; ?>>Z-A
            </option>
        </select>
    </form>
    <div class="row">
        <?php foreach ($data['produtores'] as $produtor): ?>
            <?php if (is_array($produtor) && isset($produtor['id_produtor'], $produtor['nome'])): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($produtor['nome']); ?></h5>
                            <div class="btn-group" role="group">
                                <a href="<?php echo $url_alias; ?>/produtor/get/<?php echo $produtor['id_produtor']; ?>"
                                    class="btn btn-primary">
                                    <i class="fas fa-eye me-1"></i>Ver
                                </a>
                                <?php if ($isAdmin): ?>
                                    <a href="<?php echo $url_alias; ?>/produtor/update/<?php echo $produtor['id_produtor']; ?>"
                                        class="btn btn-warning">
                                        <i class="fas fa-edit me-1"></i>Editar
                                    </a>
                                    <a href="<?php echo $url_alias; ?>/produtor/delete/<?php echo $produtor['id_produtor']; ?>"
                                        class="btn btn-danger"
                                        onclick="return confirm('Tem certeza que deseja eliminar este produtor?');">
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
        <i class="fas fa-info-circle me-2"></i>Nenhum produtor encontrado.
    </div>
<?php endif; ?>
</div>

<?php include 'app/views/partials/footer.php'; ?>