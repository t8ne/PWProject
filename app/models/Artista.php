<?php

namespace app\models;

use app\core\Db;

class Artista
{
    public static function getAllArtistas()
    {
        $conn = new Db();
        return $conn->execQuery('SELECT id_artista, nome FROM Artista');
    }

    public static function findArtistaById(int $id)
    {
        $conn = new Db();
        return $conn->execQuery('SELECT id_artista, nome FROM Artista WHERE id_artista = ?', array('i', array($id)));
    }

    public static function addArtista($data): bool
    {
        $conn = new Db();
        return $conn->execQuery('INSERT INTO Artista (nome) VALUES (?)', array(
            's',
            array($data['nome'])
        )) ? true : false;
    }

    public static function updateArtista($id, $data): bool
    {
        $conn = new Db();
        return $conn->execQuery('UPDATE Artista SET nome = ? WHERE id_artista = ?', array(
            'si',
            array($data['nome'], $id)
        )) ? true : false;
    }

    public static function deleteArtista($id): bool
    {
        $conn = new Db();
        return $conn->execQuery('DELETE FROM Artista WHERE id_artista = ?', array(
            'i',
            array($id)
        )) ? true : false;
    }
}
