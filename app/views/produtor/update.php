<?php
// Ensure $data['produtor'] exists and is an array
$produtor = isset($data['produtor']) && is_array($data['produtor']) ? $data['produtor'] : null;

if ($produtor): ?>
    <h2>Editar Produtor</h2>
    <form action="<?php echo $url_alias; ?>/produtor/update/<?php echo htmlspecialchars($produtor['id_produtor'] ?? ''); ?>"
        method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($produtor['nome'] ?? ''); ?>" required>

        <label for="nacionalidade">Nacionalidade:</label>
        <input type="text" id="nacionalidade" name="nacionalidade"
            value="<?php echo htmlspecialchars($produtor['nacionalidade'] ?? ''); ?>" required>

        <input type="submit" value="Atualizar Produtor">
    </form>
    <a href="<?php echo $url_alias; ?>/produtor">Voltar</a>
<?php else: ?>
    <p>Produtor não encontrado.</p>
    <a href="<?php echo $url_alias; ?>/produtor">Voltar para a lista</a>
<?php endif; ?>