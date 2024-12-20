<?php

use app\core\Controller;

class Artista extends Controller
{
    /**
     * Exibe a lista de artistas, com opção de pesquisa e ordenação.
     */
    public function index()
    {
        $Artistas = $this->model('Artista');

        // Obter o termo de pesquisa da URL (se existir)
        $searchTerm = $_GET['search'] ?? '';
        $ordem = $_GET['ordem'] ?? 'asc';  // Definir a ordem padrão como 'asc'

        // Se houver um termo de pesquisa, buscar artistas filtrados
        if (!empty($searchTerm)) {
            $data = $Artistas::searchArtistas($searchTerm);
        } else {
            // Caso contrário, retornar todos os artistas
            $data = $Artistas::getAllArtistas();
        }

        // Ordenar os resultados conforme o valor de 'ordem'
        if ($ordem === 'desc') {
            usort($data, function ($a, $b) {
                return strcmp($b['nome'], $a['nome']); // Ordenação decrescente
            });
        } else {
            usort($data, function ($a, $b) {
                return strcmp($a['nome'], $b['nome']); // Ordenação crescente
            });
        }

        // Passar os dados para a view
        $this->view('artista/index', ['artistas' => $data, 'search' => $searchTerm, 'ordem' => $ordem]);
    }

    /**
     * Exibe o formulário para adicionar um novo artista ou processa a criação de um artista.
     */
    public function create()
    {
        $Artistas = $this->model('Artista');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Coleta os dados do novo artista
            $newArtistaData = [
                'nome' => $_POST['nome'] ?? '',
                'nacionalidade' => $_POST['nacionalidade'] ?? ''
            ];

            // Chama o modelo para adicionar o novo artista
            $info = $Artistas::addArtista($newArtistaData);

            // Recupera todos os artistas para mostrar na página
            $data = $Artistas::getAllArtistas();

            // Exibe a lista de artistas com uma mensagem de sucesso
            $this->view('artista/index', ['artistas' => $data, 'info' => $info, 'type' => 'INSERT']);
        } else {
            // Exibe o formulário para adicionar um novo artista
            $this->view('artista/create');
        }
    }

    /**
     * Exibe os detalhes de um artista, incluindo seus álbuns.
     */
    public function get($id = null)
    {
        if (is_numeric($id)) {
            $Artistas = $this->model('Artista');
            $Albums = $this->model('Album');

            // Busca os dados do artista e seus álbuns
            $artista = $Artistas::findArtistaById($id);
            $albums = $Albums::getAlbumsByArtista($id);

            // Exibe os dados na view
            $this->view('artista/get', ['artista' => $artista, 'albums' => $albums]);
        } else {
            // Se o ID não for válido, exibe a página de erro 404
            $this->pageNotFound();
        }
    }

    /**
     * Exibe o formulário para editar os dados de um artista ou processa a atualização do artista.
     */
    public function update($id = null)
    {
        $Artistas = $this->model('Artista');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Coleta os dados do artista a ser atualizado
            $updatedArtistaData = [
                'nome' => $_POST['nome'] ?? '',
                'nacionalidade' => $_POST['nacionalidade'] ?? ''
            ];

            // Chama o modelo para atualizar o artista
            $info = $Artistas::updateArtista($id, $updatedArtistaData);

            // Recupera todos os artistas para mostrar na página
            $data = $Artistas::getAllArtistas();

            // Exibe a lista de artistas com uma mensagem de sucesso
            $this->view('artista/index', ['artistas' => $data, 'info' => $info, 'type' => 'UPDATE']);
        } else {
            // Busca os dados do artista para exibir no formulário de edição
            $data = $Artistas::findArtistaById($id);
            if ($data) {
                // Exibe o formulário com os dados do artista
                $this->view('artista/update', ['artista' => $data]);
            } else {
                // Se o artista não existir, exibe a página de erro 404
                $this->pageNotFound();
            }
        }
    }

    /**
     * Exclui um artista. Se o artista tiver álbuns associados, pede confirmação para deletar.
     */
    public function delete($id = null)
    {
        if (is_numeric($id)) {
            $Albums = $this->model('Album');
            $Musicas = $this->model('Musica');
            $albumCount = $Albums::countAlbumsByArtista($id);
            $musicaCount = $Musicas::countMusicasByArtista($id);

            // Verifica se o artista possui álbuns ou músicas associadas
            if ($albumCount > 0 || $musicaCount > 0) {
                // Se houver álbuns ou músicas, solicita confirmação antes de excluir
                $info = "Este artista possui $albumCount álbuns e $musicaCount músicas associados. Deseja excluir todos os álbuns e músicas associados junto com o artista?";
                $this->view('artista/confirmDelete', ['artista_id' => $id, 'info' => $info]);
            } else {
                // Se não houver álbuns ou músicas, exclui o artista diretamente
                $Artistas = $this->model('Artista');
                $info = $Artistas::deleteArtista($id);

                // Recupera todos os artistas para mostrar na página
                $data = $Artistas::getAllArtistas();
                $this->view('artista/index', ['artistas' => $data, 'info' => $info, 'type' => 'DELETE']);
            }
        } else {
            // Se o ID não for válido, exibe a página de erro 404
            $this->pageNotFound();
        }
    }

    /**
     * Exclui um artista e seus álbuns associados.
     */
    public function deleteWithAlbums($id = null)
    {
        if (is_numeric($id)) {
            $Albums = $this->model('Album');
            $Musicas = $this->model('Musica');

            // Verifica se o artista tem álbuns associados
            $albumCount = $Albums::countAlbumsByArtista($id);

            if ($albumCount > 0) {
                // Se houver álbuns, exclui as músicas associadas a cada álbum
                $albums = $Albums::getAlbumsByArtista($id);
                foreach ($albums as $album) {
                    // Deleta as músicas associadas ao álbum
                    $Musicas::deleteMusicasByAlbum($album['id_album']);
                    // Agora, deleta o álbum
                    $Albums::deleteAlbum($album['id_album']);
                }
            }

            // Exclui o artista
            $Artistas = $this->model('Artista');
            $info = $Artistas::deleteArtista($id);

            // Recupera todos os artistas para mostrar na página
            $data = $Artistas::getAllArtistas();
            $this->view('artista/index', ['artistas' => $data, 'info' => $info, 'type' => 'DELETE']);
        } else {
            // Se o ID não for válido, exibe a página de erro 404
            $this->pageNotFound();
        }
    }


}
