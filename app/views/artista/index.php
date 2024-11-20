<?php include 'app/views/partials/header.php'; ?>

<!-- Importando o CSS personalizado -->
<link rel="stylesheet" href="/PWProject/assets/css/style.css">

<div class="container">
    <div class="container">
        <h2 class="mb-4 text-center">
            <span class="bg-light rounded shadow p-2 text-dark">Artistas Populares</span>
        </h2>
        <div class="row">
            <?php
            // Array estático de artistas populares (simulado, sem conexão com a base de dados)
            $cards = [
                [
                    "title" => "Wisp",
                    "image" => "img-wisp",
                    "text" => "Wisp é uma artista musical de 20 anos nascida em São Francisco. Começou a sua carreira musical recentemente e é uma das responsáveis por trazer de volta o género Shoegaze ao mainstream. Tem vindo a lançar singles com consistência e em 2024 lançou um EP com 6 músicas."
                ],
                [
                    "title" => "Deftones",
                    "image" => "img-deftones",
                    "text" => "Deftones é uma das bandas mais populares de metal rock alternativo. Com lançamentos de álbuns como Around the Fur em 1997, Koi no Yokan em 2012, White Pony em 2000 e etc., tem vindo a agregar uma base de fãs de todo o tipo de gerações tendo agora novamente uma nova base de fãs através das redes sociais."
                ],
                [
                    "title" => "Lazer Dim 700",
                    "image" => "img-lazerdim",
                    "text" => "Lazer Dim 700 é um rapper de Geórgia, Estados Unidos que tem vindo a ganhar popularidade no underground do Hip-Hop devido ao seu flow e instrumentais ortodoxos. O artista apresenta algo inovador com flows rápidos e letras inteligentes por cima dos seus beats distorcidos."
                ],
                [
                    "title" => "Snow Strippers",
                    "image" => "img-ss",
                    "text" => "Snow Strippers é um grupo musical constituído pela cantora Tatiana e pelo produtor Graham. Os dois conheceram-se através do Tinder e até hoje no seu pouco tempo de fazer música têm uma base de fãs pelo mundo todo. Têm um estilo musical inovador misturando música eletrónica, Electropop e EDM."
                ],
            ];

            // Itera pelos artistas do array estático e cria um card para cada um
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
    // Verifica se há mensagens do sistema (inserção, atualização ou exclusão de artista)
    if (isset($data['info']) && is_array($data['info']) && isset($data['type'])) {
        $type = $data['type'];
        $alertClass = '';
        $icon = '';
        // Define a mensagem e o estilo do alerta com base no tipo de operação
        switch ($type) {
            case 'INSERT':
                $alertClass = 'alert-success';
                $icon = 'fa-check-circle';
                $message = 'Artista - ' . htmlspecialchars($data['info']['nome']) . ' - inserido com sucesso.';
                break;
            case 'UPDATE':
                $alertClass = 'alert-info';
                $icon = 'fa-edit';
                $message = 'A informação do artista - ' . htmlspecialchars($data['info']['nome']) . ' - foi atualizada.';
                break;
            case 'DELETE':
                $alertClass = 'alert-warning';
                $icon = 'fa-trash-alt';
                $message = 'O artista - ' . htmlspecialchars($data['info']['nome']) . ' - foi eliminado.';
                break;
        }
        // Exibe o alerta com a mensagem correspondente
        echo "<div class='alert $alertClass' role='alert'>";
        echo "<i class='fas $icon me-2'></i>$message";
        echo "</div>";
    }
    ?>

    <h2 class="mb-4 text-center">
        <span class="bg-light rounded shadow p-2 text-dark">Artistas Criados</span>
    </h2>

    <?php if ($isAdmin): ?>
        <!-- Botão para criar um novo artista -->
        <div class="mb-3">
            <a href="<?php echo $url_alias; ?>/artista/create" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Novo Artista
            </a>
        </div>
    <?php endif; ?>

    <!-- Verifica se existem artistas na base de dados para exibir -->
    <?php if (isset($data['artista']) && is_array($data['artista']) && !empty($data['artista'])): ?>
        <!-- Formulário para ordenar artistas -->
        <form method="GET" class="mb-4" action="<?php echo $url_alias; ?>/artista">
            <label for="ordem" class="form-label">Ordenar por:</label>
            <select name="ordem" id="ordem" class="form-select" onchange="this.form.submit()">
                <option value="asc" <?php echo (isset($data['ordem']) && $data['ordem'] == 'asc') ? 'selected' : ''; ?>>A-Z</option>
                <option value="desc" <?php echo (isset($data['ordem']) && $data['ordem'] == 'desc') ? 'selected' : ''; ?>>Z-A</option>
            </select>
        </form>

        <div class="row">
            <?php foreach ($data['artistas'] as $artist): ?> <!-- Itera sobre cada artista -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <!-- Exibe o nome do artista -->
                            <h5 class="card-title"><?php echo htmlspecialchars($artist['nome']); ?></h5>
                            <div class="btn-group" role="group">
                                <!-- Botão para visualizar o artista -->
                                <a href="<?php echo $url_alias; ?>/artista/get/<?php echo $artist['id_artista']; ?>"
                                    class="btn btn-primary">
                                    <i class="fas fa-eye me-1"></i>Ver
                                </a>
                                <?php if ($isAdmin): ?> <!-- Opções adicionais para administradores -->
                                    <!-- Botão para editar o artista -->
                                    <a href="<?php echo $url_alias; ?>/artista/update/<?php echo $artist['id_artista']; ?>"
                                        class="btn btn-warning">
                                        <i class="fas fa-edit me-1"></i>Editar
                                    </a>
                                    <!-- Botão para excluir o artista -->
                                    <a href="<?php echo $url_alias; ?>/artista/delete/<?php echo $artist['id_artista']; ?>"
                                        class="btn btn-danger"
                                        onclick="return confirm('Tem certeza que deseja eliminar este artista?');">
                                        <i class="fas fa-trash-alt me-1"></i>Eliminar
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <!-- Mensagem exibida se não houver artistas -->
        <div class="alert alert-info" role="alert">
            <i class="fas fa-info-circle me-2"></i>Nenhum artista encontrado.
        </div>
    <?php endif; ?>
</div>

<!-- Importando o rodapé -->
<?php include 'app/views/partials/footer.php'; ?>
