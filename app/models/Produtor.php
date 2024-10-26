<?php

namespace app\models;

use app\core\Db;

class Produtor
{
    public static function getAllProdutores()
    {
        $conn = new Db();
        return $conn->execQuery('SELECT id_produtor, nome FROM Produtor');
    }

    public static function findProdutorById(int $id)
    {
        $conn = new Db();
        return $conn->execQuery('SELECT id_produtor, nome FROM Produtor WHERE id_produtor = ?', array('i', array($id)));
    }

    public static function addProdutor($data): bool
    {
        $conn = new Db();
        return $conn->execQuery('INSERT INTO Produtor (nome) VALUES (?)', array(
            's',
            array($data['nome'])
        )) ? true : false;
    }

    public static function updateProdutor($id, $data): bool
    {
        $conn = new Db();
        return $conn->execQuery('UPDATE Produtor SET nome = ? WHERE id_produtor = ?', array(
            'si',
            array($data['nome'], $id)
        )) ? true : false;
    }

    public static function deleteProdutor($id): bool
    {
        $conn = new Db();
        return $conn->execQuery('DELETE FROM Produtor WHERE id_produtor = ?', array(
            'i',
            array($id)
        )) ? true : false;
    }
}
