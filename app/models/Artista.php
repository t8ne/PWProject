<?php

namespace app\models;

use app\core\Db;

class Artista
{
    public static function addArtista($artistaData)
    {
        $db = new Db();
        $sql = "INSERT INTO artista (nome, nacionalidade) VALUES (?, ?)";
        $params = [$artistaData['nome'], $artistaData['nacionalidade']];
        return $db->execQuery($sql, $params);
    }

    public static function findArtistaById($id)
    {
        $db = new Db();
        $sql = "SELECT * FROM artista WHERE id_artista = ?";
        $result = $db->execQuery($sql, [$id]);
        return $result ? $result[0] : null;
    }

    public static function updateArtista($id, $data)
    {
        $conn = new Db();
        $sql = 'UPDATE artista SET nome = ?, nacionalidade = ? WHERE id_artista = ?';
        return $conn->execQuery($sql, [
            $data['nome'],
            $data['nacionalidade'],
            $id
        ]);
    }


    public static function getAllArtistas()
    {
        $db = new Db();
        $sql = "SELECT * FROM artista";
        return $db->execQuery($sql);
    }

    public static function deleteArtista($id)
    {
        $db = new Db();
        $sql = "DELETE FROM artista WHERE id_artista = ?";
        return $db->execQuery($sql, [$id]);
    }
}
