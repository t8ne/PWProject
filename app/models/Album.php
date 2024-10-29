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
        $sql = "SELECT id_album, nome, data, id_artista, id_genero FROM Album WHERE id_album = ?";
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

    public static function getMusicasByAlbum($albumId)
    {
        $db = new Db();
        $sql = "SELECT m.*, p.nome as produtor_nome FROM Musica m LEFT JOIN Produtor p ON m.id_produtor = p.id_produtor WHERE m.id_album = ?";
        return $db->execQuery($sql, [$albumId]);
    }

}
