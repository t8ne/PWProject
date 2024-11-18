<?php

namespace app\models;

use app\core\Db;

class Musica
{
    /**
     * Obtém todas as músicas da tabela 'Musica'.
     *
     * @return array Lista de músicas.
     */
    public static function getAllMusicas()
    {
        $conn = new Db();
        return $conn->execQuery('SELECT id_musica, nome, tempo, id_album, id_produtor FROM Musica');
    }

    /**
     * Encontra uma música pelo seu ID.
     *
     * @param int $id ID da música a ser buscada.
     * @return array Dados da música encontrada.
     */
    public static function findMusicaById($id)
    {
        $db = new Db();
        $sql = "SELECT id_musica, nome, tempo, id_album, id_produtor FROM Musica WHERE id_musica = ?";
        return $db->execQuery($sql, [$id]);
    }

    /**
     * Adiciona uma nova música à tabela 'Musica'.
     *
     * @param array $musicaData Dados da música (nome, tempo, id_album, id_produtor).
     * @return bool Resultado da execução da query.
     */
    public static function addMusica($musicaData)
    {
        $db = new Db();
        $sql = "INSERT INTO Musica (nome, tempo, id_album, id_produtor) VALUES (?, ?, ?, ?)";
        $params = [
            $musicaData['nome'],
            $musicaData['tempo'],
            $musicaData['id_album'],
            $musicaData['id_produtor']
        ];
        return $db->execQuery($sql, $params);
    }

    /**
     * Atualiza os dados de uma música.
     *
     * @param int $id ID da música a ser atualizada.
     * @param array $musicaData Dados atualizados da música.
     * @return bool Resultado da execução da query.
     */
    public static function updateMusica($id, $musicaData)
    {
        $db = new Db();
        $sql = "UPDATE Musica SET nome = ?, tempo = ?, id_album = ?, id_produtor = ? WHERE id_musica = ?";
        $params = [
            $musicaData['nome'],
            $musicaData['tempo'],
            $musicaData['id_album'],
            $musicaData['id_produtor'],
            $id
        ];
        return $db->execQuery($sql, $params);
    }

    /**
     * Remove uma música da tabela 'Musica' pelo seu ID.
     *
     * @param int $id ID da música a ser removida.
     * @return bool Resultado da execução da query.
     */
    public static function deleteMusica($id)
    {
        $db = new Db();
        $sql = "DELETE FROM Musica WHERE id_musica = ?";
        return $db->execQuery($sql, [$id]);
    }

    /**
     * Obtém todas as músicas de um álbum específico.
     *
     * @param int $albumId ID do álbum.
     * @return array Lista de músicas pertencentes ao álbum.
     */
    public static function getMusicasByAlbum($albumId)
    {
        $db = new Db();
        $sql = "SELECT * FROM Musica WHERE id_album = ?";
        return $db->execQuery($sql, [$albumId]);
    }

    /**
     * Obtém todas as músicas de um produtor específico.
     *
     * @param int $produtorId ID do produtor.
     * @return array Lista de músicas associadas ao produtor.
     */
    public static function getMusicasByProdutor($produtorId)
    {
        $db = new Db();
        $sql = "SELECT * FROM Musica WHERE id_produtor = ?";
        return $db->execQuery($sql, [$produtorId]);
    }

    /**
     * Conta o número de músicas associadas a um álbum específico.
     *
     * @param int $albumId ID do álbum.
     * @return int Número total de músicas no álbum.
     */
    public static function countMusicasByAlbum($albumId)
    {
        $db = new Db();
        $sql = "SELECT COUNT(*) AS total FROM Musica WHERE id_album = ?";
        $result = $db->execQuery($sql, [$albumId]);
        return $result[0]['total'] ?? 0; // Retorna o número de músicas associadas ou 0 se não houver músicas.
    }

    /**
     * Remove todas as músicas de um álbum específico.
     *
     * @param int $albumId ID do álbum.
     * @return bool Resultado da execução da query.
     */
    public static function deleteMusicasByAlbum($albumId)
    {
        $db = new Db();
        $sql = "DELETE FROM Musica WHERE id_album = ?";
        return $db->execQuery($sql, [$albumId]);
    }
}
