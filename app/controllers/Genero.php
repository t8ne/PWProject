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
            $data = $Generos::findGeneroById($id);
            $this->view('genero/get', ['genero' => $data]);
        } else {
            $this->pageNotFound();
        }
    }

    public function create()
    {
        $Generos = $this->model('Genero');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newGeneroData = ['nome' => $_POST['nome']];
            $info = $Generos::addGenero($newGeneroData);

            $data = $Generos::getAllGeneros();
            $this->view('genero/index', ['generos' => $data, 'info' => $info, 'type' => 'INSERT']);
        } else {
            $this->view('genero/create');
        }
    }

    public function update($id = null)
    {
        $Generos = $this->model('Genero');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedGeneroData = ['nome' => $_POST['nome']];
            $info = $Generos::updateGenero($id, $updatedGeneroData);

            $data = $Generos::getAllGeneros();
            $this->view('genero/index', ['generos' => $data, 'info' => $info, 'type' => 'UPDATE']);
        } else {
            $data = $Generos::findGeneroById($id);
            $this->view('genero/update', ['genero' => $data]);
        }
    }

    public function delete($id = null)
    {
        if (is_numeric($id)) {
            $Generos = $this->model('Genero');
            $info = $Generos::deleteGenero($id);

            $data = $Generos::getAllGeneros();
            $this->view('genero/index', ['generos' => $data, 'info' => $info, 'type' => 'DELETE']);
        } else {
            $this->pageNotFound();
        }
    }
}
