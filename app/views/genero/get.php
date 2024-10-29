<?php if (empty($data['genero'])): ?>
    <h1>O gênero não existe na nossa base de dados...</h1>
<?php else: ?>
    <div>
        <strong>Nome:</strong> <?php echo htmlspecialchars($data['genero'][0]['nome']); ?>
    </div>

    <h3>Álbuns:</h3>
    <?php if (!empty($data['albums']) && is_array($data['albums'])): ?>
        <ul>
            <?php foreach ($data['albums'] as $album): ?>
                <li>
                    <a href="<?php echo $url_alias; ?>/album/get/<?php echo $album['id_album']; ?>">
                        <?php echo htmlspecialchars($album['nome']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Não existem álbuns associados a este gênero.</p>
    <?php endif; ?>
<?php endif; ?>

<a href="<?php echo $url_alias; ?>/genero">Voltar</a>