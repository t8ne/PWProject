<?php

namespace app\models;

use app\core\Db;

class Album
{
    public static function getAllAlbums()
    {
        $conn = new Db();
        return $conn->execQuery('SELECT id_album, nome, data, id_artista FROM Album');
    }

    public static function findAlbumById($id)
    {
        $db = new Db();
        $sql = "SELECT a.id_album, a.nome, a.data, a.id_artista, a.id_genero, ar.nome AS nome_artista 
            FROM Album a
            LEFT JOIN Artista ar ON a.id_artista = ar.id_artista
            WHERE a.id_album = ?";
        return $db->execQuery($sql, [$id]);
    }

    public static function addAlbum($albumData)
    {
        $db = new Db();
        $sql = "INSERT INTO Album (nome, data, id_artista, id_genero) VALUES (?, ?, ?, ?)";
        $params = [
            $albumData['nome'],
            $albumData['data'],
            $albumData['id_artista'],
            $albumData['id_genero']
        ];
        return $db->execQuery($sql, $params);
    }

    public static function deleteAlbum($id)
    {
        $db = new Db();
        $sql = "DELETE FROM Album WHERE id_album = ?";
        return $db->execQuery($sql, [$id]);
    }

    public static function updateAlbum($id, $albumData)
    {
        $db = new Db();
        $sql = "UPDATE Album SET nome = ?, data = ?, id_artista = ?, id_genero = ? WHERE id_album = ?";
        $params = [
            $albumData['nome'],
            $albumData['data'],
            $albumData['id_artista'],
            $albumData['id_genero'],
            $id
        ];
        return $db->execQuery($sql, $params);
    }

    public static function getAlbumsByArtista($artistaId)
    {
        $db = new Db();
        $sql = "SELECT * FROM Album WHERE id_artista = ?";
        return $db->execQuery($sql, [$artistaId]);
    }

    public static function getAlbumsByGenero($generoId)
    {
        $db = new Db();
        $sql = "SELECT * FROM Album WHERE id_genero = ?";
        return $db->execQuery($sql, [$generoId]);
    }

    public static function countMusicasByAlbum($albumId)
    {
        $db = new Db();
        $sql = "SELECT COUNT(*) AS total FROM Musica WHERE id_album = ?";
        $result = $db->execQuery($sql, [$albumId]);
        return $result[0]['total'] ?? 0;
    }

    public static function countAlbumsByArtista($artistaId)
    {
        $db = new Db();
        $sql = "SELECT COUNT(*) AS total FROM Album WHERE id_artista = ?";
        $result = $db->execQuery($sql, [$artistaId]);
        return $result[0]['total'] ?? 0; // Retorna o número de álbuns associados
    }


    public static function deleteAlbumsByArtista($artistaId)
    {
        $db = new Db();
        $sql = "DELETE FROM Album WHERE id_artista = ?";
        return $db->execQuery($sql, [$artistaId]);
    }

    public static function countAlbumsByGenero($generoId)
    {
        $db = new Db();
        $sql = "SELECT COUNT(*) AS total FROM Album WHERE id_genero = ?";
        $result = $db->execQuery($sql, [$generoId]);
        return $result[0]['total'] ?? 0; // Retorna o número de álbuns associados
    }

    public static function deleteAlbumsByGenero($generoId)
    {
        $db = new Db();
        $sql = "DELETE FROM Album WHERE id_genero = ?";
        return $db->execQuery($sql, [$generoId]);
    }


}
