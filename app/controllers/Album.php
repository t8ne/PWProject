<?php

use app\core\Controller;

class Album extends Controller
{
    public function index()
    {
        $Albums = $this->model('Album');
        $data = $Albums::getAllAlbums();
        $this->view('album/index', ['albums' => $data]);
    }

    public function get($id = null)
    {
        if (is_numeric($id)) {
            $Albums = $this->model('Album');
            $data = $Albums::findAlbumById($id);
            $this->view('album/get', ['album' => $data]);
        } else {
            $this->pageNotFound();
        }
    }

    public function create()
    {
        $Albums = $this->model('Album');
        $Artistas = $this->model('Artista');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newAlbumData = [
                'nome' => $_POST['nome'],
                'data' => $_POST['data'],
                'id_artista' => $_POST['id_artista']
            ];
            $info = $Albums::addAlbum($newAlbumData);

            $data = $Albums::getAllAlbums();
            $this->view('album/index', ['albums' => $data, 'info' => $info, 'type' => 'INSERT']);
        } else {
            $artistas = $Artistas::getAllArtistas();
            $this->view('album/create', ['artistas' => $artistas]);
        }
    }

    public function update($id = null)
    {
        $Albums = $this->model('Album');
        $Artistas = $this->model('Artista');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedAlbumData = [
                'nome' => $_POST['nome'],
                'data' => $_POST['data'],
                'id_artista' => $_POST['id_artista']
            ];
            $info = $Albums::updateAlbum($id, $updatedAlbumData);

            $data = $Albums::getAllAlbums();
            $this->view('album/index', ['albums' => $data, 'info' => $info, 'type' => 'UPDATE']);
        } else {
            $data = $Albums::findAlbumById($id);
            if (empty($data)) {
                $this->pageNotFound(); // Se o álbum não existir, redirecionar para a página 404
            }
            $artistas = $Artistas::getAllArtistas();
            $this->view('album/update', ['album' => $data, 'artistas' => $artistas]);
        }
    }

    public function delete($id = null)
    {
        if (is_numeric($id)) {
            $Albums = $this->model('Album');
            $info = $Albums::deleteAlbum($id);

            $data = $Albums::getAllAlbums();
            $this->view('album/index', ['albums' => $data, 'info' => $info, 'type' => 'DELETE']);
        } else {
            $this->pageNotFound();
        }
    }
}
