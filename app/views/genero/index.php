<?php include 'app/views/partials/header.php'; ?>

<link rel="stylesheet" href="/PWProject/assets/css/style.css">

<div class="container">
    <div class="container">
        <h2 class="mb-4" style="text-align: center">Géneros Populares</h2>
        <div class="row">
            <?php
            // Gêneros estáticos e dinâmicos
            $cards = [
                [
                    "title" => "Rock",
                    "image" => "img-rock",
                    "text" => "O rock é um género musical que surgiu nos anos 1950, misturando blues e R&B. É conhecido pelo uso da guitarra elétrica e letras sobre liberdade e rebeldia. Influenciou diversos estilos e gerações."
                ],
                [
                    "title" => "Jazz",
                    "image" => "img-jazz",
                    "text" => "O jazz é um género musical caracterizado pela improvisação e variação rítmica. Originou no final do século XIX e influenciou diversos outros géneros musicais."
                ],
                [
                    "title" => "Pop",
                    "image" => "img-pop",
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

<h2 class="mb-4" style="text-align: center">Géneros Criados</h2>

<?php if ($isAdmin): ?>
    <div class="mb-3">
        <a href="<?php echo $url_alias; ?>/genero/create" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i>Novo Género
        </a>
    </div>
<?php endif; ?>

<?php if (isset($data['generos']) && is_array($data['generos']) && !empty($data['generos'])): ?>
    <form method="GET" class="mb-4" action="<?php echo $url_alias; ?>/genero">
        <label for="ordem" class="form-label">Ordenar por:</label>
        <select name="ordem" id="ordem" class="form-select" onchange="this.form.submit()">
            <option value="asc" <?php echo (isset($data['ordem']) && $data['ordem'] == 'asc') ? 'selected' : ''; ?>>A-Z
            </option>
            <option value="desc" <?php echo (isset($data['ordem']) && $data['ordem'] == 'desc') ? 'selected' : ''; ?>>Z-A
            </option>
        </select>
    </form>
    <div class="row">
        <?php foreach ($data['generos'] as $genero): ?>
            <?php if (is_array($genero) && isset($genero['id_genero'], $genero['nome'])): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($genero['nome']); ?></h5>
                            <div class="btn-group" role="group">
                                <a href="<?php echo $url_alias; ?>/genero/get/<?php echo $genero['id_genero']; ?>"
                                    class="btn btn-primary">
                                    <i class="fas fa-eye me-1"></i>Ver
                                </a>
                                <?php if ($isAdmin): ?>
                                    <a href="<?php echo $url_alias; ?>/genero/update/<?php echo $genero['id_genero']; ?>"
                                        class="btn btn-warning">
                                        <i class="fas fa-edit me-1"></i>Editar
                                    </a>
                                    <a href="<?php echo $url_alias; ?>/genero/delete/<?php echo $genero['id_genero']; ?>"
                                        class="btn btn-danger"
                                        onclick="return confirm('Tem certeza que deseja eliminar este genero?');">
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
        <i class="fas fa-info-circle me-2"></i>Nenhum genero encontrado.
    </div>
<?php endif; ?>
</div>

<?php include 'app/views/partials/footer.php'; ?>