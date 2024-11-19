<?php include 'app/views/partials/header.php'; ?>

<div class="container">
    <h2 class="mb-4" style="text-align: center">Produtores Populares</h2>
    <div class="container">
        <div class="row">
            <?php
            // Gêneros estáticos e dinâmicos
            $cards = [
                [
                    "title" => "WeGonBeOK",
                    "image" => "imgs/artworks-qzHznKsD1Eo0QU3J-E2yF4w-t500x500.jpg",
                    "text" => "O rock é um género musical que surgiu nos anos 1950, misturando blues e R&B. É conhecido pelo uso da guitarra elétrica e letras sobre liberdade e rebeldia. Marcou gerações e influenciou diversos estilos."
                ],
                [
                    "title" => "Pierre Bourne",
                    "image" => "imgs/ab6761610000e5eb057015e505454bc625940dc3.jpg",
                    "text" => "O jazz é um género musical caracterizado pela improvisação e variação rítmica. Originou no final do século XIX e influenciou diversos outros géneros musicais."
                ],
                [
                    "title" => "Richie Souf",
                    "image" => "imgs/ab6761610000e5eb5ad21e2a5c2f5f784b1c65ab.jpg",
                    "text" => "O pop é um género musical popular conhecido pelo seu apelo mainstream, melodias cativantes e foco em vocais e produção."
                ],
                [
                    "title" => "2hollis",
                    "image" => "imgs/2ollis.jpg",
                    "text" => "O Trap é um subgénero do hip-hop que surgiu no sul dos Estados Unidos nos anos 2000. É caracterizado por batidas pesadas e preseça de 808s, além de letras que exploram temas urbanos e da vida nas ruas."
                ],
            ];

            // Ordenação dos cards estáticos
            $ordem = isset($_GET['ordem']) ? $_GET['ordem'] : 'asc';
            usort($cards, function ($a, $b) use ($ordem) {
                return $ordem === 'asc'
                    ? strcasecmp($a['title'], $b['title']) // A-Z
                    : strcasecmp($b['title'], $a['title']); // Z-A
            });

            // Exibir cada card na grid
            foreach ($cards as $card) {
                echo '
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="' . $card["image"] . '" alt="Imagem de ' . $card["title"] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . $card["title"] . '</h5>
                            <p class="card-text">' . $card["text"] . '</p>
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

<?php
// Ordenação dos produtores dinâmicos
if (isset($data['produtores']) && is_array($data['produtores'])) {
    usort($data['produtores'], function ($a, $b) use ($ordem) {
        return $ordem === 'asc'
            ? strcasecmp($a['nome'], $b['nome']) // A-Z
            : strcasecmp($b['nome'], $a['nome']); // Z-A
    });
}
?>

<?php if (isset($data['produtores']) && is_array($data['produtores']) && !empty($data['produtores'])): ?>
    <!-- Formulário para seleção da ordem alfabética -->
    <form method="GET" class="mb-4">
        <label for="ordem" class="form-label">Ordenar por:</label>
        <select name="ordem" id="ordem" class="form-select" onchange="this.form.submit()">
            <option value="asc" <?php echo ($ordem === 'asc') ? 'selected' : ''; ?>>A-Z</option>
            <option value="desc" <?php echo ($ordem === 'desc') ? 'selected' : ''; ?>>Z-A</option>
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
