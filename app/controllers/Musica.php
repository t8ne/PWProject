<?php

use app\core\Controller;

class Musica extends Controller
{
    public function index()
    {
        $Musicas = $this->model('Musica');
        $data = $Musicas::getAllMusicas();
        $this->view('musica/index', ['musicas' => $data]);
    }

    public function get($id = null)
    {
        if (is_numeric($id)) {
            $Musicas = $this->model('Musica');
            $data = $Musicas::findMusicaById($id);
            $this->view('musica/get', ['musica' => $data]);
        } else {
            $this->pageNotFound();
        }
    }

    public function create()
    {
        $Musicas = $this->model('Musica');
        $Albums = $this->model('Album');
        $Produtores = $this->model('Produtor');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newMusicaData = [
                'nome' => $_POST['nome'],
                'tempo' => $_POST['tempo'],
                'id_album' => $_POST['id_album'],
                'id_produtor' => $_POST['id_produtor']
            ];
            $info = $Musicas::addMusica($newMusicaData);

            $data = $Musicas::getAllMusicas();
            $this->view('musica/index', ['musicas' => $data, 'info' => $info, 'type' => 'INSERT']);
        } else {
            $albums = $Albums::getAllAlbums();
            $produtores = $Produtores::getAllProdutores();
            $this->view('musica/create', ['albums' => $albums, 'produtores' => $produtores]);
        }
    }

    public function delete($id = null)
    {
        if (is_numeric($id)) {
            $Musicas = $this->model('Musica');
            $info = $Musicas::deleteMusica($id);

            $data = $Musicas::getAllMusicas();
            $this->view('musica/index', ['musicas' => $data, 'info' => $info, 'type' => 'DELETE']);
        } else {
            $this->pageNotFound();
        }
    }

    public function update($id = null)
    {
        $Musicas = $this->model('Musica');
        $Albums = $this->model('Album');
        $Produtores = $this->model('Produtor');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedMusicaData = [
                'nome' => $_POST['nome'] ?? '',
                'tempo' => $_POST['tempo'] ?? '',
                'id_album' => $_POST['id_album'] ?? '',
                'id_produtor' => $_POST['id_produtor'] ?? ''
            ];
            $info = $Musicas::updateMusica($id, $updatedMusicaData);

            $data = $Musicas::getAllMusicas();
            $this->view('musica/index', ['musicas' => $data, 'info' => $info, 'type' => 'UPDATE']);
        } else {
            $data = $Musicas::findMusicaById($id);
            if (empty($data)) {
                $this->pageNotFound();
            }
            $albums = $Albums::getAllAlbums();
            $produtores = $Produtores::getAllProdutores();
            $this->view('musica/update', ['musica' => $data, 'albums' => $albums, 'produtores' => $produtores]);
        }
    }
}