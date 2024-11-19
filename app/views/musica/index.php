<?php include 'app/views/partials/header.php'; ?> <!-- Inclui o cabeçalho da página -->

<div class="container">
    <h2 class="mb-4" style="text-align: center">Músicas Criadas</h2>

    <?php if ($isAdmin): ?> <!-- Exibe o botão para criar música apenas se o usuário for administrador -->
        <div class="mb-3">
            <a href="<?php echo $url_alias; ?>/musica/create" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Nova Música <!-- Ícone e texto do botão -->
            </a>
        </div>
    <?php endif; ?>

    <?php
    // Exibe mensagens de feedback após ações como inserir, atualizar ou excluir músicas
    if (isset($data['musica']) && isset($data['type'])) {
        $type = $data['type'];
        $alertClass = ''; // Classe CSS para o alerta
        $icon = ''; // Ícone correspondente à ação
        switch ($type) {
            case 'INSERT': // Mensagem ao inserir música
                $alertClass = 'alert-success';
                $icon = 'fa-check-circle';
                $message = 'Música - ' . htmlspecialchars($data['musica']['nome']) . ' - inserida com sucesso.';
                break;
            case 'UPDATE': // Mensagem ao atualizar música
                $alertClass = 'alert-info';
                $icon = 'fa-edit';
                $message = 'A informação da música - ' . htmlspecialchars($data['musica']['nome']) . ' - foi atualizada.';
                break;
            case 'DELETE': // Mensagem ao excluir música
                $alertClass = 'alert-warning';
                $icon = 'fa-trash-alt';
                $message = 'A música - ' . htmlspecialchars($data['musica']['nome']) . ' - foi eliminada.';
                break;
        }
        // Exibe o alerta formatado
        echo "<div class='alert $alertClass' role='alert'>";
        echo "<i class='fas $icon me-2'></i>$message";
        echo "</div>";
    }

    // Ordena as músicas por ordem alfabética
    if (isset($data['musicas']) && is_array($data['musicas'])) {
        $ordem = isset($_GET['ordem']) ? $_GET['ordem'] : 'asc'; // Obtém a ordem (padrão: asc)
        usort($data['musicas'], function ($a, $b) use ($ordem) {
            return $ordem === 'asc'
                ? strcasecmp($a['nome'], $b['nome']) // A-Z
                : strcasecmp($b['nome'], $a['nome']); // Z-A
        });
    }
    ?>

    <?php if (isset($data['musicas']) && is_array($data['musicas']) && !empty($data['musicas'])): ?>
        <!-- Formulário para seleção da ordem alfabética -->
        <form method="GET" class="mb-4">
            <label for="ordem" class="form-label">Ordenar por:</label>
            <select name="ordem" id="ordem" class="form-select" onchange="this.form.submit()">
                <option value="asc" <?php echo (isset($_GET['ordem']) && $_GET['ordem'] == 'asc') ? 'selected' : ''; ?>>A-Z</option>
             
            </select>
        </form>

        <div class="row">
            <?php foreach ($data['musicas'] as $musica): ?> <!-- Itera sobre a lista de músicas -->
                <div class="col-md-4 mb-4"> <!-- Define a largura e espaçamento de cada música na grade -->
                    <div class="card"> <!-- Cartão para cada música -->
                        <div class="card-body">
                            <!-- Título da música -->
                            <h5 class="card-title"><?php echo htmlspecialchars($musica['nome']); ?></h5>
                            <!-- Botões de ação -->
                            <div class="btn-group" role="group">
                                <!-- Botão para visualizar a música -->
                                <a href="<?php echo $url_alias; ?>/musica/get/<?php echo $musica['id_musica']; ?>"
                                   class="btn btn-primary">
                                    <i class="fas fa-eye me-1"></i>Ver
                                </a>
                                <?php if ($isAdmin): ?> <!-- Botões adicionais para administrador -->
                                    <!-- Botão para editar a música -->
                                    <a href="<?php echo $url_alias; ?>/musica/update/<?php echo $musica['id_musica']; ?>"
                                       class="btn btn-warning">
                                        <i class="fas fa-edit me-1"></i>Editar
                                    </a>
                                    <!-- Botão para excluir a música com confirmação -->
                                    <a href="<?php echo $url_alias; ?>/musica/delete/<?php echo $musica['id_musica']; ?>"
                                       class="btn btn-danger"
                                       onclick="return confirm('Tem certeza que deseja eliminar esta música?');">
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
        <!-- Mensagem caso nenhuma música seja encontrada -->
        <div class="alert alert-info" role="alert">
            <i class="fas fa-info-circle me-2"></i>Nenhuma música encontrada.
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/partials/footer.php'; ?> <!-- Inclui o rodapé da página -->
