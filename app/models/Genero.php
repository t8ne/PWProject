<?php

namespace app\models;

use app\core\Db;

class Genero
{
    public static function getAllGeneros($ordem = 'asc')
    {
        $db = new Db();
        $sql = "SELECT * FROM Genero ORDER BY nome " . ($ordem === 'desc' ? 'DESC' : 'ASC');
        return $db->execQuery($sql);
    }

    public static function findGeneroById($id)
    {
        $db = new Db();
        $sql = "SELECT id_genero, nome FROM genero WHERE id_genero = ?";
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
        $sql = "INSERT INTO genero (nome) VALUES (?)";
        return $db->execQuery($sql, [$data['nome']]);
    }

    public static function deleteGenero($id)
    {
        $db = new Db();
        $sql = "DELETE FROM genero WHERE id_genero = ?";
        return $db->execQuery($sql, [$id]);
    }
}
