<?php include 'app/views/partials/header.php'; ?> <!-- Inclui o cabeçalho da página -->

<div class="container">
    <h2 class="mb-4" style="text-align: center">Artistas Criados</h2>

    <?php if ($isAdmin): ?> <!-- Verifica se o usuário atual é um administrador -->
        <div class="mb-3">
            <!-- Botão para criar um novo artista, visível apenas para administradores -->
            <a href="<?php echo $url_alias; ?>/artista/create" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Novo Artista
            </a>
        </div>
    <?php endif; ?>

    <?php
    // Exibe mensagens sobre ações realizadas (adicionar, editar, excluir artista)
    if (isset($data['info']) && is_array($data['info']) && isset($data['type'])) {
        $type = $data['type']; // Determina o tipo de ação
        $alertClass = ''; // Classe CSS do alerta
        $icon = ''; // Ícone do alerta
    
        // Define o conteúdo do alerta com base no tipo de ação
        switch ($type) {
            case 'INSERT': // Inserção de artista
                $alertClass = 'alert-success'; // Alerta verde
                $icon = 'fa-check-circle'; // Ícone de sucesso
                $message = 'Artista - ' . htmlspecialchars($data['info']['nome']) . ' - inserido com sucesso.';
                break;
            case 'UPDATE': // Atualização de artista
                $alertClass = 'alert-info'; // Alerta azul
                $icon = 'fa-edit'; // Ícone de edição
                $message = 'A informação do artista - ' . htmlspecialchars($data['info']['nome']) . ' - foi atualizada.';
                break;
            case 'DELETE': // Exclusão de artista
                $alertClass = 'alert-warning'; // Alerta amarelo
                $icon = 'fa-trash-alt'; // Ícone de exclusão
                $message = 'O artista - ' . htmlspecialchars($data['info']['nome']) . ' - foi eliminado.';
                break;
        }

        // Exibe o alerta na tela
        echo "<div class='alert $alertClass' role='alert'>";
        echo "<i class='fas $icon me-2'></i>$message";
        echo "</div>";
    }

    if (isset($data['artistas']) && is_array($data['artistas']) && !empty($data['artistas'])) {
        // Ordena os artistas em ordem crescente (A-Z, padrão)
        usort($data['artistas'], function ($a, $b) {
            return strcmp($a['nome'], $b['nome']);
        });
    }
    ?>

    <?php if (isset($data['artistas']) && is_array($data['artistas']) && !empty($data['artistas'])): ?>
        <form method="GET" class="mb-4">
            <label for="ordem" class="form-label">Ordenar por:</label>
            <select name="ordem" id="ordem" class="form-select" onchange="this.form.submit()">
                <option value="asc" <?php echo (isset($_GET['ordem']) && $_GET['ordem'] == 'asc') ? 'selected' : ''; ?>>A-Z
                </option>
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

<?php include 'app/views/partials/footer.php'; ?>