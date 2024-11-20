<?php

use app\core\Controller;

class Musica extends Controller
{
    /**
     * Exibe a lista de todas as músicas.
     */
    public function index()
    {
        $Musicas = $this->model('Musica');
        // Recupera todas as músicas da base de dados
        $data = $Musicas::getAllMusicas();

        // Passa os dados para a view, para exibir todas as músicas
        $this->view('musica/index', ['musicas' => $data]);
    }

    /**
     * Exibe os detalhes de uma música específica.
     */
    public function get($id = null)
    {
        if (is_numeric($id)) {
            $Musicas = $this->model('Musica');
            // Recupera a música específica pelo ID
            $data = $Musicas::findMusicaById($id);

            // Se a música for encontrada, exibe seus detalhes
            if ($data) {
                $this->view('musica/get', ['musica' => $data]);
            } else {
                // Se a música não for encontrada, exibe a página de erro 404
                $this->pageNotFound();
            }
        } else {
            // Se o ID não for válido, exibe a página de erro 404
            $this->pageNotFound();
        }
    }

    /**
     * Exibe o formulário para criar uma nova música ou processa a criação de uma música.
     */
    public function create()
    {
        $Musicas = $this->model('Musica');
        $Albums = $this->model('Album');
        $Produtores = $this->model('Produtor');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Coleta os dados enviados para criar a nova música
            $newMusicaData = [
                'nome' => $_POST['nome'],
                'tempo' => $_POST['tempo'],
                'id_album' => $_POST['id_album'],
                'id_produtor' => $_POST['id_produtor']
            ];

            // Adiciona a música ao banco de dados
            $info = $Musicas::addMusica($newMusicaData);

            // Recupera todas as músicas e exibe na página, junto com uma mensagem de sucesso
            $data = $Musicas::getAllMusicas();
            $this->view('musica/index', ['musicas' => $data, 'info' => $info, 'type' => 'INSERT']);
        } else {
            // Se não for um POST, exibe o formulário de criação da música
            $albums = $Albums::getAllAlbums();   // Recupera todos os álbuns
            $produtores = $Produtores::getAllProdutores(); // Recupera todos os produtores
            $this->view('musica/create', ['albums' => $albums, 'produtores' => $produtores]);
        }
    }

    /**
     * Exclui uma música do banco de dados.
     */
    public function delete($id = null)
    {
        if (is_numeric($id)) {
            $Musicas = $this->model('Musica');
            // Exclui a música do banco de dados com o ID fornecido
            $info = $Musicas::deleteMusica($id);

            // Recupera todas as músicas após a exclusão e exibe na página
            $data = $Musicas::getAllMusicas();
            $this->view('musica/index', ['musicas' => $data, 'info' => $info, 'type' => 'DELETE']);
        } else {
            // Se o ID não for válido, exibe a página de erro 404
            $this->pageNotFound();
        }
    }

    /**
     * Exibe o formulário para editar os dados de uma música ou processa a atualização de uma música.
     */
    public function update($id = null)
    {
        $Musicas = $this->model('Musica');
        $Albums = $this->model('Album');
        $Produtores = $this->model('Produtor');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Coleta os dados para atualizar a música
            $updatedMusicaData = [
                'nome' => $_POST['nome'] ?? '',
                'tempo' => $_POST['tempo'] ?? '',
                'id_album' => $_POST['id_album'] ?? '',
                'id_produtor' => $_POST['id_produtor'] ?? ''
            ];

            // Atualiza os dados da música no banco de dados
            $info = $Musicas::updateMusica($id, $updatedMusicaData);

            // Recupera todas as músicas após a atualização e exibe na página
            $data = $Musicas::getAllMusicas();
            $this->view('musica/index', ['musicas' => $data, 'info' => $info, 'type' => 'UPDATE']);
        } else {
            // Se não for um POST, exibe o formulário de edição da música
            $data = $Musicas::findMusicaById($id);
            if (empty($data)) {
                // Se a música não existir, exibe a página de erro 404
                $this->pageNotFound();
            }

            // Recupera todos os álbuns e produtores para exibir no formulário
            $albums = $Albums::getAllAlbums();
            $produtores = $Produtores::getAllProdutores();
            $this->view('musica/update', [
                'musica' => $data,
                'albums' => $albums,
                'produtores' => $produtores,
            ]);
        }
    }

}
