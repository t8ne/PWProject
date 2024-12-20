<?php include 'app/views/partials/header.php'; ?>

<link rel="stylesheet" href="/PWProject/assets/css/style.css">

<div class="container">
    <h2 class="mb-4 text-center">
        <span class="bg-light rounded shadow p-2 text-dark">Produtores Populares</span>
    </h2>
    <div class="container">
        <div class="row">
            <?php
            // Gêneros estáticos e dinâmicos
            $cards = [
                [
                    "title" => "WeGonBeOK",
                    "image" => "img-ok",
                    "text" => "William Dale Minnix III, conhecido profissionalmente como OK, é um produtor musical americano de Charlotte, Carolina do Norte que está a revolucionar o trap recente underground com a sua produção inovadora colaborando com artistas menos conhecidos."
                ],
                [
                    "title" => "Pierre Bourne",
                    "image" => "img-pierre",
                    "text" => "Produtor musical e rapper americano de Fort Riley, Kansas, é conhecido por ter produzido os singles de 2017 Magnolia de Playboi Carti e Gummo de 6ix9ine. Tem vários álbuns em seu nome e é considerado como dos melhores produtores desta geração, criando músicas calmas e de ambiente."
                ],
                [
                    "title" => "Richie Souf",
                    "image" => "img-richie",
                    "text" => "Produtor musical de hip hop certificado como platina, reconhecido pelas suas colaborações com Makonnen Sheran, MadeinTYO, e uma forte presença na segunda versão do álbum Whole Lotta Red do Playboi Carti. É conhecido pelas suas melodias angélicas e produção calma."
                ],
                [
                    "title" => "2hollis",
                    "image" => "img-2hollis",
                    "text" => "Cantor, e produtor americano de Chicago, Illinois. Ganhou atenção pela primeira vez com o seu álbum de 2022, White Tiger. Em 2024 abriu os concertos da tour do Ken Carson pondo assim os olhos de um público mais mainstream nele. A sua produção é inovadora misturando elementos de rage com Hyperpop e EDM."
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
                $message = 'Produtor - ' . htmlspecialchars($data['info']['nome']) . ' - inserido com sucesso.';
                break;
            case 'UPDATE':
                $alertClass = 'alert-info';
                $icon = 'fa-edit';
                $message = 'A informação do produtor - ' . htmlspecialchars($data['info']['nome']) . ' - foi atualizada.';
                break;
            case 'DELETE':
                $alertClass = 'alert-warning';
                $icon = 'fa-trash-alt';
                $message = 'O produtor - ' . htmlspecialchars($data['info']['nome']) . ' - foi eliminado.';
                break;
        }
        echo "<div class='alert $alertClass' role='alert'>";
        echo "<i class='fas $icon me-2'></i>$message";
        echo "</div>";
    }
    ?>
</div>

<h2 class="mb-4 text-center">
    <span class="bg-light rounded shadow p-2 text-dark">Produtores Criados</span>
</h2>

<?php if ($isAdmin): ?>
    <div class="mb-3">
        <a href="<?php echo $url_alias; ?>/produtor/create" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i>Novo Produtor
        </a>
    </div>
<?php endif; ?>

<?php
// Filtro de pesquisa por nome
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Lógica de ordenação
$ordem = isset($_GET['ordem']) ? $_GET['ordem'] : 'asc'; // valor padrão é 'asc'

// Filtro: Ordenação
usort($data['produtores'], function ($a, $b) use ($ordem) {
    if ($ordem == 'asc') {
        return strcmp($a['nome'], $b['nome']); // Ordena A-Z
    }
});


?>

<form method="GET" class="mb-4">
  
    <!-- Campo de ordenação -->
    <label for="ordem" class="form-label mt-3">Ordenar por:</label>
    <select name="ordem" id="ordem" class="form-select" onchange="this.form.submit()">
        <option value="asc" <?php echo ($ordem == 'asc') ? 'selected' : ''; ?>>A-Z</option>
        <option value="desc" <?php echo ($ordem == 'desc') ? 'selected' : ''; ?>>Z-A</option>
    </select>
</form>

<?php if (isset($data['produtores']) && is_array($data['produtores']) && !empty($data['produtores'])): ?>
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
