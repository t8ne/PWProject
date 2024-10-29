<?php

namespace app\models;

use app\core\Db;

class Genero
{
    public static function getAllGeneros()
    {
        $conn = new Db();
        return $conn->execQuery('SELECT id_genero, nome FROM Genero');
    }

    public static function findGeneroById($id)
    {
        $db = new Db();
        $sql = "SELECT id_genero, nome FROM Genero WHERE id_genero = ?";
        return $db->execQuery($sql, [$id]);
    }

    public static function updateGenero($id, $generoData)
    {
        $db = new Db();
        $sql = "UPDATE Genero SET nome = ? WHERE id_genero = ?";
        $params = [$generoData['nome'], $id];
        return $db->execQuery($sql, $params);
    }

    public static function addGenero($data)
    {
        $db = new Db();
        $sql = "INSERT INTO Genero (nome) VALUES (?)";
        return $db->execQuery($sql, [$data['nome']]);
    }

    public static function deleteGenero($id)
    {
        $db = new Db();
        $sql = "DELETE FROM Genero WHERE id_genero = ?";
        return $db->execQuery($sql, [$id]);
    }
}
