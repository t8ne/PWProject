<?php include 'app/views/partials/header.php'; ?>

<div class="container">
    <h2 class="mb-4">Lista de Géneros</h2>

    <?php if ($isAdmin): ?>
        <div class="mb-3">
            <a href="<?php echo $url_alias; ?>/genero/create" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Novo Género
            </a>
        </div>
    <?php endif; ?>

    <!-- Formulário para seleção da ordem alfabética -->
    <form method="GET" class="mb-4">
        <label for="ordem" class="form-label">Ordenar por:</label>
        <select name="ordem" id="ordem" class="form-select" onchange="this.form.submit()">
            <option value="asc" <?php echo (isset($_GET['ordem']) && $_GET['ordem'] == 'asc') ? 'selected' : ''; ?>>A-Z</option>
        </select>
    </form>
    <div class="container">
        <div class="row">
            <?php
            // Gêneros estáticos e dinâmicos
            $cards = [
                [
                    "title" => "Rock",
                    "image" => "imgs/1-2-1024x560.jpg",
                    "text" => "O rock é um género musical que surgiu nos anos 1950, misturando blues e R&B. É conhecido pelo uso da guitarra elétrica e letras sobre liberdade e rebeldia. Marcou gerações e influenciou diversos estilos."
                ],
                [
                    "title" => "Jazz",
                    "image" => "imgs/v2-ao2cs-5s7wk.jpg",
                    "text" => "O jazz é um género musical caracterizado pela improvisação e variação rítmica. Originou no final do século XIX e influenciou diversos outros géneros musicais."
                ],
                [
                    "title" => "Pop",
                    "image" => "imgs/pop punk comp copy.avif",
                    "text" => "O pop é um género musical popular conhecido pelo seu apelo mainstream, melodias cativantes e foco em vocais e produção."
                ],
                [
                    "title" => "Trap",
                    "image" => "imgs/hq720.jpg",
                    "text" => "O Trap é um subgénero do hip-hop que surgiu no sul dos Estados Unidos nos anos 2000. É caracterizado por batidas pesadas e preseça de 808s, além de letras que exploram temas urbanos e da vida nas ruas."
                ],
            ];

            // Mesclar os gêneros dinâmicos se houver
            if (isset($data['generos']) && is_array($data['generos'])) {
                foreach ($data['generos'] as $genero) {
                    $cards[] = [
                        "title" => htmlspecialchars($genero['nome']),
                        "image" => !empty($genero['imagem']) ? $genero['imagem'] : 'imgs/default.jpg',
                        "text" => !empty($genero['descricao']) ? htmlspecialchars($genero['descricao']) : 'Descrição não disponível.'
                    ];
                }
            }

            // Exibir cada card na grid
            foreach ($cards as $card) {
                echo '
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="'.$card["image"].'" alt="Imagem de '.$card["title"].'">
                        <div class="card-body">
                            <h5 class="card-title">'.$card["title"].'</h5>
                            <p class="card-text">'.$card["text"].'</p>
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

<?php include 'app/views/partials/footer.php'; ?>
