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
            // Carregar modelo Album e buscar dados do álbum pelo ID
            $Albums = $this->model('Album');
            $data = $Albums::findAlbumById($id);

            // Carregar modelo Musica e buscar músicas associadas ao álbum pelo ID
            $Musicas = $this->model('Musica');
            $musicas = $Musicas::getMusicasByAlbum($id);

            // Enviar dados do álbum e das músicas para a view
            $this->view('album/get', [
                'album' => $data,
                'musicas' => $musicas // Adiciona as músicas associadas
            ]);
        } else {
            $this->pageNotFound();
        }
    }


    public function create()
    {
        $Albums = $this->model('Album');
        $Artistas = $this->model('Artista');
        $Generos = $this->model('Genero');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newAlbumData = [
                'nome' => $_POST['nome'],
                'data' => $_POST['data'],
                'id_artista' => $_POST['id_artista'],
                'id_genero' => $_POST['id_genero']
            ];
            $info = $Albums::addAlbum($newAlbumData);

            $data = $Albums::getAllAlbums();
            $this->view('album/index', ['albums' => $data, 'info' => $info, 'type' => 'INSERT']);
        } else {
            $artistas = $Artistas::getAllArtistas();
            $generos = $Generos::getAllGeneros();
            $this->view('album/create', ['artistas' => $artistas, 'generos' => $generos]);
        }
    }

    public function delete($id = null)
    {
        if (is_numeric($id)) {
            $Musicas = $this->model('Musica');
            $musicaCount = $Musicas::countMusicasByAlbum($id);

            if ($musicaCount > 0) {
                // Se houver músicas associadas, pedir confirmação ao usuário
                $info = "Este álbum possui $musicaCount músicas associadas. Deseja excluir todas as músicas associadas junto com o álbum?";
                $this->view('album/confirmDelete', ['album_id' => $id, 'info' => $info]);
            } else {
                // Se não houver músicas, excluir o álbum diretamente
                $Albums = $this->model('Album');
                $info = $Albums::deleteAlbum($id);

                $data = $Albums::getAllAlbums();
                $this->view('album/index', ['albums' => $data, 'info' => $info, 'type' => 'DELETE']);
            }
        } else {
            $this->pageNotFound();
        }
    }


    public function update($id = null)
    {
        $Albums = $this->model('Album');
        $Artistas = $this->model('Artista');
        $Generos = $this->model('Genero');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedAlbumData = [
                'nome' => $_POST['nome'] ?? '',
                'data' => $_POST['data'] ?? '',
                'id_artista' => $_POST['id_artista'] ?? '',
                'id_genero' => $_POST['id_genero'] ?? ''
            ];
            $info = $Albums::updateAlbum($id, $updatedAlbumData);

            $data = $Albums::getAllAlbums();
            $this->view('album/index', ['albums' => $data, 'info' => $info, 'type' => 'UPDATE']);
        } else {
            $data = $Albums::findAlbumById($id);
            if (empty($data)) {
                $this->pageNotFound();
            }
            $artistas = $Artistas::getAllArtistas();
            $generos = $Generos::getAllGeneros();
            $this->view('album/update', ['album' => $data, 'artistas' => $artistas, 'generos' => $generos]);
        }
    }

    public function deleteWithMusicas($id = null)
    {
        if (is_numeric($id)) {
            $Musicas = $this->model('Musica');
            $Musicas::deleteMusicasByAlbum($id); // Exclui todas as músicas associadas

            $Albums = $this->model('Album');
            $info = $Albums::deleteAlbum($id); // Exclui o álbum

            $data = $Albums::getAllAlbums();
            $this->view('album/index', ['albums' => $data, 'info' => $info, 'type' => 'DELETE']);
        } else {
            $this->pageNotFound();
        }
    }

}
