<?php

use app\core\Controller;

class Produtor extends Controller
{

    public function index()
    {
        $Produtores = $this->model('Produtor');
        $data = $Produtores::getAllProdutores();
        $this->view('produtor/index', ['produtores' => $data]);
    }

    public function get($id = null)
    {
        if (is_numeric($id)) {
            $Produtores = $this->model('Produtor');
            $data = $Produtores::findProdutorById($id);
            $this->view('produtor/get', ['produtor' => $data]);
        } else {
            $this->pageNotFound();
        }
    }

    public function create()
    {
        $Produtores = $this->model('Produtor');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newProdutorData = ['nome' => $_POST['nome']];
            $info = $Produtores::addProdutor($newProdutorData);

            $data = $Produtores::getAllProdutores();
            $this->view('produtor/index', ['produtores' => $data, 'info' => $info, 'type' => 'INSERT']);
        } else {
            $this->view('produtor/create');
        }
    }

    public function update($id = null)
    {
        $Produtores = $this->model('Produtor');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedProdutorData = ['nome' => $_POST['nome']];
            $info = $Produtores::updateProdutor($id, $updatedProdutorData);

            $data = $Produtores::getAllProdutores();
            $this->view('produtor/index', ['produtores' => $data, 'info' => $info, 'type' => 'UPDATE']);
        } else {
            $data = $Produtores::findProdutorById($id);
            $this->view('produtor/update', ['produtor' => $data]);
        }
    }

    public function delete($id = null)
    {
        if (is_numeric($id)) {
            $Produtores = $this->model('Produtor');
            $info = $Produtores::deleteProdutor($id);

            $data = $Produtores::getAllProdutores();
            $this->view('produtor/index', ['produtores' => $data, 'info' => $info, 'type' => 'DELETE']);
        } else {
            $this->pageNotFound();
        }
    }
}
