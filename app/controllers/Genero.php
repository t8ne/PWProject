<?php

use app\core\Controller;

class Genero extends Controller
{
    public function index()
    {
        $Generos = $this->model('Genero');

        // Get the sorting order from the GET parameter, default to 'asc' if not set
        $ordem = isset($_GET['ordem']) ? $_GET['ordem'] : 'asc';

        // Get sorted genres
        $generos = $Generos::getAllGeneros($ordem);

        // Pass both the genres and the current order to the view
        $this->view('genero/index', ['generos' => $generos, 'ordem' => $ordem]);
    }

    public function get($id = null)
    {
        if (is_numeric($id)) {
            // Carregar modelo Genero
            $Generos = $this->model('Genero');
            $data = $Generos::findGeneroById($id); // Busca o gênero

            // Carregar modelo Album
            $Albums = $this->model('Album');
            $albums = $Albums::getAlbumsByGenero($id); // Busca álbuns associados ao gênero

            if ($data) {
                // Enviar dados do gênero e dos álbuns para a view
                $this->view('genero/get', [
                    'genero' => $data,
                    'albums' => $albums // Inclui álbuns associados
                ]);
            } else {
                $this->pageNotFound(); // Gênero não encontrado
            }
        } else {
            $this->pageNotFound(); // ID não numérico
        }
    }


    public function update($id = null)
    {
        $Generos = $this->model('Genero');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedGeneroData = [
                'nome' => $_POST['nome'] ?? ''
            ];
            $info = $Generos::updateGenero($id, $updatedGeneroData);

            $data = $Generos::getAllGeneros();
            $this->view('genero/index', ['generos' => $data, 'info' => $info, 'type' => 'UPDATE']);
        } else {
            $data = $Generos::findGeneroById($id);
            if (empty($data)) {
                $this->pageNotFound();
            }
            $this->view('genero/update', ['genero' => $data]);
        }
    }

    public function create()
    {
        $Generos = $this->model('Genero');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newGeneroData = [
                'nome' => $_POST['nome'],
            ];
            $info = $Generos::addGenero($newGeneroData);

            $data = $Generos::getAllGeneros();
            $this->view('genero/index', ['generos' => $data, 'info' => $info, 'type' => 'INSERT']);
        } else {
            $this->view('genero/create');
        }
    }

    public function delete($id = null)
    {
        if (is_numeric($id)) {
            $Albums = $this->model('Album');
            $albumCount = $Albums::countAlbumsByGenero($id); // Contar álbuns associados

            if ($albumCount > 0) {
                // Se houver álbuns associados, pedir confirmação ao usuário
                $info = "Este género possui $albumCount álbuns associados. Deseja excluir todos os álbuns associados junto com o género?";
                $this->view('genero/confirmDelete', ['genero_id' => $id, 'info' => $info]);
            } else {
                // Se não houver álbuns, excluir o género diretamente
                $Generos = $this->model('Genero');
                $info = $Generos::deleteGenero($id);

                $data = $Generos::getAllGeneros();
                $this->view('genero/index', ['generos' => $data, 'info' => $info, 'type' => 'DELETE']);
            }
        } else {
            $this->pageNotFound();
        }
    }

    public function deleteWithAlbums($id = null)
    {
        if (is_numeric($id)) {
            $Albums = $this->model('Album');

            // Excluir todos os álbuns associados ao género
            $Albums::deleteAlbumsByGenero($id);

            $Generos = $this->model('Genero');
            $info = $Generos::deleteGenero($id); // Excluir o género

            $data = $Generos::getAllGeneros();
            $this->view('genero/index', ['generos' => $data, 'info' => $info, 'type' => 'DELETE']);
        } else {
            $this->pageNotFound();
        }
    }
}
