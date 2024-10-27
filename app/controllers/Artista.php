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

            // Assegura que $data é um array válido (mesmo que vazio) para evitar erros na view
            $this->view('artista/get', ['artista' => $data ? $data : []]);
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
            $updatedArtistData = [
                'nome' => $_POST['nome']
            ];
            $info = $Artistas::updateArtist($id, $updatedArtistData);

            if ($info) {
                // Se a atualização foi bem-sucedida, obtenha os dados atualizados
                $data = $Artistas::findArtistById($id);
                $this->view('artista/index', ['info' => $info, 'artista' => $data]);
            } else {
                // Trate o caso em que a atualização falhou
                $this->view('artista/index', ['info' => ['nome' => 'Erro ao atualizar o artista']]);
            }
        } else {
            // Código para exibir o formulário de edição
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
