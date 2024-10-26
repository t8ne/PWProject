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

    public static function findGeneroById(int $id)
    {
        $conn = new Db();
        return $conn->execQuery('SELECT id_genero, nome FROM Genero WHERE id_genero = ?', array('i', array($id)));
    }

    public static function addGenero($data): bool
    {
        $conn = new Db();
        return $conn->execQuery('INSERT INTO Genero (nome) VALUES (?)', array(
            's',
            array($data['nome'])
        )) ? true : false;
    }

    public static function updateGenero($id, $data): bool
    {
        $conn = new Db();
        return $conn->execQuery('UPDATE Genero SET nome = ? WHERE id_genero = ?', array(
            'si',
            array($data['nome'], $id)
        )) ? true : false;
    }

    public static function deleteGenero($id): bool
    {
        $conn = new Db();
        return $conn->execQuery('DELETE FROM Genero WHERE id_genero = ?', array(
            'i',
            array($id)
        )) ? true : false;
    }
}
