<?php

namespace app\models;

use app\core\Db;

class Genero
{
    public static function getAllGeneros()
    {
        $conn = new Db();
        return $conn->execQuery('SELECT id_genero, nome, id_album FROM Genero');
    }

    public static function findGeneroById(int $id)
    {
        $conn = new Db();
        return $conn->execQuery('SELECT id_genero, nome, id_album FROM Genero WHERE id_genero = ?', ['i', [$id]]);
    }

    public static function addGenero($data): bool
    {
        $conn = new Db();
        return $conn->execQuery('INSERT INTO Genero (nome, id_album) VALUES (?, ?)', [
            'si',
            [$data['nome'], $data['id_album']]
        ]) ? true : false;
    }

    public static function updateGenero($id, $data): bool
    {
        $conn = new Db();
        return $conn->execQuery('UPDATE Genero SET nome = ?, id_album = ? WHERE id_genero = ?', [
            'ssi',
            [$data['nome'], $data['id_album'], $id]
        ]) ? true : false;
    }

    public static function deleteGenero($id): bool
    {
        $conn = new Db();
        return $conn->execQuery('DELETE FROM Genero WHERE id_genero = ?', ['i', [$id]]) ? true : false;
    }
}
