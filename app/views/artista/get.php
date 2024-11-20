<?php include 'app/views/partials/header.php'; ?> <!-- Inclui o cabeçalho da página -->

<link rel="stylesheet" href="/PWProject/assets/css/style.css">

<div class="container">
    <div class="row justify-content-center"> <!-- Centraliza o conteúdo horizontalmente -->
        <div class="col-md-8"> <!-- Define a largura máxima do conteúdo -->
            <div class="card mt-5"> <!-- Cria um cartão com margem superior -->
                <div class="card-body">
                    <!-- Exibe o nome do artista no centro -->
                    <h2 class="card-title text-center mb-4"><?php echo htmlspecialchars($data['artista']['nome']); ?>
                    </h2>

                    <!-- Exibe a nacionalidade do artista -->
                    <p class="text-center mb-4">
                        <strong>Nacionalidade:</strong>
                        <?php echo htmlspecialchars($data['artista']['nacionalidade']); ?>
                    </p>

                    <!-- Título para a seção de álbuns -->
                    <h3 class="text-center mb-3">Álbuns</h3>

                    <?php if (!empty($data['albums'])): ?> <!-- Verifica se o artista possui álbuns -->
                        <div class="list-group">
                            <?php foreach ($data['albums'] as $album): ?> <!-- Itera sobre cada álbum do artista -->
                                <!-- Link para acessar os detalhes de um álbum -->
                                <a href="<?php echo $url_alias; ?>/album/get/<?php echo $album['id_album']; ?>"
                                    class="list-group-item list-group-item-action">
                                    <i class="fas fa-compact-disc me-2"></i>
                                    <?php echo htmlspecialchars($album['nome']); ?> <!-- Nome do álbum -->
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <!-- Mensagem caso o artista não tenha álbuns registrados -->
                        <p class="text-center">Este artista não tem álbuns registrados.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Botão para voltar à lista de artistas -->
            <div class="text-center mt-3">
                <a href="<?php echo $url_alias; ?>/artista" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Voltar para Lista de Artistas
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/partials/footer.php'; ?> <!-- Inclui o rodapé da página -->