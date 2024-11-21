<?php include 'app/views/partials/header.php'; ?>

<!-- Inclusão do arquivo de estilo CSS -->
<link rel="stylesheet" href="/PWProject/assets/css/style.css">

<!-- Seção principal da página -->
<div class="container">
    <!-- Título principal da seção -->
    <h2 class="mb-4 text-center">
        <span class="bg-light rounded shadow p-2 text-dark">Géneros Populares</span>
    </h2>

    <div class="container">
        <div class="row">
            <?php
            // Definindo um array de gêneros musicais com título, imagem e descrição
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

            // Loop para exibir os cards de gêneros musicais
            foreach ($cards as $card) {
                echo '
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card" style="width: 100%;">
                        <!-- Imagem do gênero (classe da imagem dinâmica) -->
                        <div class="card-img-top ' . htmlspecialchars($card["image"]) . '" style="height: 200px;"></div>
                        <div class="card-body">
                            <!-- Título do gênero -->
                            <h5 class="card-title">' . htmlspecialchars($card["title"]) . '</h5>
                            <!-- Descrição do gênero -->
                            <p class="card-text">' . htmlspecialchars($card["text"]) . '</p>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>

    <?php
    // Verificação e exibição de mensagens de sucesso, erro ou atualização
    if (isset($data['info']) && is_array($data['info']) && isset($data['type'])) {
        $type = $data['type'];
        $alertClass = '';
        $icon = '';
        switch ($type) {
            case 'INSERT':
                $alertClass = 'alert-success'; // Sucesso
                $icon = 'fa-check-circle'; // Ícone de sucesso
                $message = 'Género - ' . htmlspecialchars($data['info']['nome']) . ' - inserido com sucesso.';
                break;
            case 'UPDATE':
                $alertClass = 'alert-info'; // Informação
                $icon = 'fa-edit'; // Ícone de edição
                $message = 'A informação do género - ' . htmlspecialchars($data['info']['nome']) . ' - foi atualizada.';
                break;
            case 'DELETE':
                $alertClass = 'alert-warning'; // Aviso
                $icon = 'fa-trash-alt'; // Ícone de lixo
                $message = 'O género - ' . htmlspecialchars($data['info']['nome']) . ' - foi eliminado.';
                break;
        }
        echo "<div class='alert $alertClass' role='alert'>";
        echo "<i class='fas $icon me-2'></i>$message"; // Exibe a mensagem
        echo "</div>";
    }
    ?>
</div>

<!-- Seção de "Géneros Criados" -->
<h2 class="mb-4 text-center">
    <span class="bg-light rounded shadow p-2 text-dark">Géneros Criados</span>
</h2>

<!-- Verifica se o usuário tem permissão de admin -->
<?php if ($isAdmin): ?>
    <div class="mb-3">
        <!-- Link para criar um novo gênero, acessível apenas para administradores -->
        <a href="<?php echo $url_alias; ?>/genero/create" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i>Novo Género
        </a>
    </div>
<?php endif; ?>

<?php if (isset($data['generos']) && is_array($data['generos']) && !empty($data['generos'])): ?>
    <!-- Formulário para ordenar os gêneros (A-Z ou Z-A) -->
    <form method="GET" class="mb-4" action="<?php echo $url_alias; ?>/genero">
        <label for="ordem" class="form-label">Ordenar por:</label>
        <select name="ordem" id="ordem" class="form-select" onchange="this.form.submit()">
            <option value="asc" <?php echo (isset($data['ordem']) && $data['ordem'] == 'asc') ? 'selected' : ''; ?>>A-Z</option>
            <option value="desc" <?php echo (isset($data['ordem']) && $data['ordem'] == 'desc') ? 'selected' : ''; ?>>Z-A</option>
        </select>
    </form>

    <div class="row">
        <!-- Loop através dos gêneros cadastrados -->
        <?php foreach ($data['generos'] as $genero): ?>
            <?php if (is_array($genero) && isset($genero['id_genero'], $genero['nome'])): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <!-- Título do gênero -->
                            <h5 class="card-title"><?php echo htmlspecialchars($genero['nome']); ?></h5>
                            <!-- Botões de ações (Ver, Editar, Eliminar) -->
                            <div class="btn-group" role="group">
                                <a href="<?php echo $url_alias; ?>/genero/get/<?php echo $genero['id_genero']; ?>"
                                    class="btn btn-primary">
                                    <i class="fas fa-eye me-1"></i>Ver
                                </a>
                                <?php if ($isAdmin): ?>
                                    <!-- Editar gênero -->
                                    <a href="<?php echo $url_alias; ?>/genero/update/<?php echo $genero['id_genero']; ?>"
                                        class="btn btn-warning">
                                        <i class="fas fa-edit me-1"></i>Editar
                                    </a>
                                    <!-- Excluir gênero com confirmação -->
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
    <!-- Mensagem caso não haja gêneros cadastrados -->
    <div class="alert alert-info" role="alert">
        <i class="fas fa-info-circle me-2"></i>Nenhum genero encontrado.
    </div>
<?php endif; ?>
</div>

<?php include 'app/views/partials/footer.php'; ?>
