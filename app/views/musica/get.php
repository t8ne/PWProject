<?php include 'app/views/partials/header.php'; ?> <!-- Inclui o cabeçalho da página -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5"> <!-- Cria um cartão para estilizar o conteúdo -->
                <div class="card-body">
                    <?php if (empty($data['musica'])): ?> <!-- Verifica se os dados da música estão vazios -->
                        <!-- Mensagem exibida quando a música não existe na base de dados -->
                        <h1 class="text-center">A música não existe na nossa base de dados...</h1>
                    <?php else: ?>
                        <!-- Exibe o nome da música como título -->
                        <h2 class="card-title text-center mb-4"><?php echo htmlspecialchars($data['musica'][0]['nome']); ?>
                        </h2>
                        <div class="row"> <!-- Cria uma linha para exibir as informações da música -->
                            <div class="col-md-6">
                                <!-- Exibe o tempo da música -->
                                <p><strong>Tempo:</strong> <?php echo htmlspecialchars($data['musica'][0]['tempo']); ?></p>
                                <!-- Exibe o ID ou nome do álbum ao qual a música pertence -->
                                <p><strong>Álbum:</strong> <?php echo htmlspecialchars($data['musica'][0]['id_album']); ?></p>
                            </div>
                            <div class="col-md-6">
                                <!-- Exibe o produtor da música -->
                                <p><strong>Produtor:</strong>
                                    <?php
                                    // Verifica se o produtor foi excluído e exibe a mensagem apropriada
                                    if (is_null($data['musica'][0]['id_produtor'])) {
                                        echo "Produtor eliminado.";
                                    } else {
                                        echo htmlspecialchars($data['musica'][0]['id_produtor']);
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Botão para retornar à lista de músicas -->
            <div class="text-center mt-3">
                <a href="<?php echo $url_alias; ?>/musica" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Voltar para Lista de Músicas
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/partials/footer.php'; ?> <!-- Inclui o rodapé da página -->
