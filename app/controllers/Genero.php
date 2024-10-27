<?php

use app\core\Controller;

class Genero extends Controller
{
    public function index()
    {
        $Generos = $this->model('Genero');
        $data = $Generos::getAllGeneros();
        $this->view('genero/index', ['generos' => $data]);
    }

    public function get($id = null)
    {
        if (is_numeric($id)) {
            $Generos = $this->model('Genero');
            $data = $Generos::findGeneroById($id); // Supondo que este método retorne o gênero correspondente
            $this->view('genero/get', ['genero' => $data]);
        } else {
            $this->pageNotFound();
        }
    }

    public function create()
    {
        $Generos = $this->model('Genero');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newGeneroData = [
                'nome' => $_POST['nome'],
                'id_album' => $_POST['id_album'] // Make sure this exists
            ];
            $info = $Generos::addGenero($newGeneroData);

            $data = $Generos::getAllGeneros();
            $this->view('genero/index', ['generos' => $data, 'info' => $info, 'type' => 'INSERT']);
        } else {
            $albums = $this->model('Album')->getAllAlbums(); // Assuming you need to show albums
            $this->view('genero/create', ['albums' => $albums]);
        }
    }

    public function update($id = null)
    {
        $Generos = $this->model('Genero');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedGeneroData = [
                'nome' => $_POST['nome'],
                'id_album' => $_POST['id_album']
            ];
            $info = $Generos::updateGenero($id, $updatedGeneroData);

            $data = $Generos::getAllGeneros();
            $this->view('genero/index', ['generos' => $data, 'info' => $info, 'type' => 'UPDATE']);
        } else {
            $data = $Generos::findGeneroById($id);
            if (empty($data)) {
                $this->pageNotFound();
            }
            $albums = $this->model('Album')->getAllAlbums(); // Assuming you need to show albums
            $this->view('genero/update', ['genero' => $data, 'albums' => $albums]);
        }
    }

    public function delete($id = null)
    {
        if (is_numeric($id)) {
            $Generos = $this->model('Genero');
            $info = $Generos::deleteGenero($id);

            // Certifique-se de que está buscando os gêneros novamente
            $data = $Generos::getAllGeneros();
            $this->view('genero/index', ['generos' => $data, 'info' => $info, 'type' => 'DELETE']);
        } else {
            $this->pageNotFound();
        }
    }

}
