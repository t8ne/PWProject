<?php

namespace app\models;

use app\core\Db;

class Artista
{
    public static function addArtista($artistaData)
    {
        $db = new Db();
        $sql = "INSERT INTO Artista (nome, nacionalidade) VALUES (?, ?)";
        $params = [$artistaData['nome'], $artistaData['nacionalidade']];
        return $db->execQuery($sql, $params);
    }

    public static function findArtistaById($id)
    {
        $db = new Db();
        $sql = "SELECT * FROM Artista WHERE id_artista = ?";
        $result = $db->execQuery($sql, [$id]);
        return $result ? $result[0] : null;
    }

    public static function updateArtista($id, $artistaData)
    {
        $db = new Db();
        $sql = "UPDATE Artista SET nome = ?, nacionalidade = ? WHERE id_artista = ?";
        $params = [$artistaData['nome'], $artistaData['nacionalidade'], $id];
        return $db->execQuery($sql, $params);
    }

    public static function getAllArtistas()
    {
        $db = new Db();
        $sql = "SELECT * FROM Artista";
        return $db->execQuery($sql);
    }

    public static function deleteArtista($id)
    {
        $db = new Db();
        $sql = "DELETE FROM Artista WHERE id_artista = ?";
        return $db->execQuery($sql, [$id]);
    }
}
