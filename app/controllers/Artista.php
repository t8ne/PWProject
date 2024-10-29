<?php

use app\core\Controller;

class Artista extends Controller
{

    public function index()
    {
        $Artistas = $this->model('Artista');
        $data = $Artistas::getAllArtistas();
        $this->view('artista/index', ['artistas' => $data]);
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
            $albumCount = $Albums::countAlbumsByArtista($id); // Contar álbuns associados

            if ($albumCount > 0) {
                // Se houver álbuns associados, pedir confirmação ao usuário
                $info = "Este artista possui $albumCount álbuns associados. Deseja excluir todos os álbuns associados junto com o artista?";
                $this->view('artista/confirmDelete', ['artista_id' => $id, 'info' => $info]);
            } else {
                // Se não houver álbuns, excluir o artista diretamente
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

            // Excluir todos os álbuns associados ao artista
            $Albums::deleteAlbumsByArtista($id);

            $Artistas = $this->model('Artista');
            $info = $Artistas::deleteArtista($id); // Excluir o artista

            $data = $Artistas::getAllArtistas();
            $this->view('artista/index', ['artistas' => $data, 'info' => $info, 'type' => 'DELETE']);
        } else {
            $this->pageNotFound();
        }
    }

}
