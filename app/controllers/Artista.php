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

    public function get($id = null)
    {
        if (is_numeric($id)) {
            $Artistas = $this->model('Artista');
            $data = $Artistas::findArtistaById($id);
            $this->view('artista/get', ['artista' => $data]);
        } else {
            $this->pageNotFound();
        }
    }

    public function create()
    {
        $Artistas = $this->model('Artista');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newArtistaData = ['nome' => $_POST['nome']];
            $info = $Artistas::addArtista($newArtistaData);

            $data = $Artistas::getAllArtistas();
            $this->view('artista/index', ['artistas' => $data, 'info' => $info, 'type' => 'INSERT']);
        } else {
            $this->view('artista/create');
        }
    }

    public function update($id = null)
    {
        $Artistas = $this->model('Artista');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedArtistaData = ['nome' => $_POST['nome']];
            $info = $Artistas::updateArtista($id, $updatedArtistaData);

            $data = $Artistas::getAllArtistas();
            $this->view('artista/index', ['artistas' => $data, 'info' => $info, 'type' => 'UPDATE']);
        } else {
            $data = $Artistas::findArtistaById($id);
            $this->view('artista/update', ['artista' => $data]);
        }
    }

    public function delete($id = null)
    {
        if (is_numeric($id)) {
            $Artistas = $this->model('Artista');
            $info = $Artistas::deleteArtista($id);

            $data = $Artistas::getAllArtistas();
            $this->view('artista/index', ['artistas' => $data, 'info' => $info, 'type' => 'DELETE']);
        } else {
            $this->pageNotFound();
        }
    }
}
