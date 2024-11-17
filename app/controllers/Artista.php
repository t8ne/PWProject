<?php

use app\core\Controller;

class Artista extends Controller
{
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
                return strcmp($b['nome'], $a['nome']);
            });
        } else {
            usort($data, function ($a, $b) {
                return strcmp($a['nome'], $b['nome']);
            });
        }

        // Passar os dados para a view
        $this->view('artista/index', ['artistas' => $data, 'search' => $searchTerm, 'ordem' => $ordem]);
    }

    public function create()
    {
        $Artistas = $this->model('Artista');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newArtistaData = [
                'nome' => $_POST['nome'] ?? '',
                'nacionalidade' => $_POST['nacionalidade'] ?? ''
            ];
            $info = $Artistas::addArtista($newArtistaData);

            $data = $Artistas::getAllArtistas();
            $this->view('artista/index', ['artistas' => $data, 'info' => $info, 'type' => 'INSERT']);
        } else {
            $this->view('artista/create');
        }
    }

    public function get($id = null)
    {
        if (is_numeric($id)) {
            $Artistas = $this->model('Artista');
            $Albums = $this->model('Album');
            $artista = $Artistas::findArtistaById($id);
            $albums = $Albums::getAlbumsByArtista($id);
            $this->view('artista/get', ['artista' => $artista, 'albums' => $albums]);
        } else {
            $this->pageNotFound();
        }
    }

    public function update($id = null)
    {
        $Artistas = $this->model('Artista');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedArtistaData = [
                'nome' => $_POST['nome'] ?? '',
                'nacionalidade' => $_POST['nacionalidade'] ?? ''
            ];
            $info = $Artistas::updateArtista($id, $updatedArtistaData);

            $data = $Artistas::getAllArtistas();
            $this->view('artista/index', ['artistas' => $data, 'info' => $info, 'type' => 'UPDATE']);
        } else {
            $data = $Artistas::findArtistaById($id);
            if ($data) {
                $this->view('artista/update', ['artista' => $data]);
            } else {
                $this->pageNotFound();
            }
        }
    }

    public function delete($id = null)
    {
        if (is_numeric($id)) {
            $Albums = $this->model('Album');
            $albumCount = $Albums::countAlbumsByArtista($id);

            if ($albumCount > 0) {
                $info = "Este artista possui $albumCount álbuns associados. Deseja excluir todos os álbuns associados junto com o artista?";
                $this->view('artista/confirmDelete', ['artista_id' => $id, 'info' => $info]);
            } else {
                $Artistas = $this->model('Artista');
                $info = $Artistas::deleteArtista($id);

                $data = $Artistas::getAllArtistas();
                $this->view('artista/index', ['artistas' => $data, 'info' => $info, 'type' => 'DELETE']);
            }
        } else {
            $this->pageNotFound();
        }
    }

    public function deleteWithAlbums($id = null)
    {
        if (is_numeric($id)) {
            $Albums = $this->model('Album');
            $Albums::deleteAlbumsByArtista($id);

            $Artistas = $this->model('Artista');
            $info = $Artistas::deleteArtista($id);

            $data = $Artistas::getAllArtistas();
            $this->view('artista/index', ['artistas' => $data, 'info' => $info, 'type' => 'DELETE']);
        } else {
            $this->pageNotFound();
        }
    }
}
