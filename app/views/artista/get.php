<h2><?php echo htmlspecialchars($data['artista']['nome']); ?></h2>
<p>Nacionalidade: <?php echo htmlspecialchars($data['artista']['nacionalidade']); ?></p>

<h3>Álbuns:</h3>
<ul>
    <?php foreach ($data['albums'] as $album): ?>
        <li>
            <a href="<?php echo $url_alias; ?>/album/get/<?php echo $album['id_album']; ?>">
                <?php echo htmlspecialchars($album['nome']); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>