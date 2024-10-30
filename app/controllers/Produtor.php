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
            // Carregar modelo Produtor e buscar dados do produtor pelo ID
            $Produtores = $this->model('Produtor');
            $data = $Produtores::findProdutorById($id);

            // Carregar modelo Musica e buscar músicas associadas ao produtor pelo ID
            $Musicas = $this->model('Musica');
            $musicas = $Musicas::getMusicasByProdutor($id);

            // Enviar dados do produtor e das músicas para a view
            $this->view('produtor/get', [
                'produtor' => $data,
                'musicas' => $musicas // Adiciona as músicas associadas ao produtor
            ]);
        } else {
            $this->pageNotFound();
        }
    }


    public function create()
    {
        $Produtores = $this->model('Produtor');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newProdutorData = [
                'nome' => $_POST['nome'],
                'nacionalidade' => $_POST['nacionalidade']
            ];
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
            $updatedProdutorData = [
                'nome' => $_POST['nome'],
                'nacionalidade' => $_POST['nacionalidade']
            ];
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

            // Atualizar músicas para definir id_produtor como NULL
            $Produtores::unsetProdutorInMusicas($id);

            // Agora deletar o produtor
            $info = $Produtores::deleteProdutor($id);

            $data = $Produtores::getAllProdutores();
            $this->view('produtor/index', ['produtores' => $data, 'info' => $info, 'type' => 'DELETE']);
        } else {
            $this->pageNotFound();
        }
    }

}
