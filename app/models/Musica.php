<?php

namespace app\models;

use app\core\Db;

class Musica
{
    public static function getAllMusicas()
    {
        $conn = new Db();
        return $conn->execQuery('SELECT id_musica, nome, tempo, id_album, id_produtor FROM Musica');
    }

    public static function findMusicaById($id)
    {
        $db = new Db();
        $sql = "SELECT id_musica, nome, tempo, id_album, id_produtor FROM Musica WHERE id_musica = ?";
        return $db->execQuery($sql, [$id]);
    }

    public static function addMusica($musicaData)
    {
        $db = new Db();
        $sql = "INSERT INTO Musica (nome, tempo, id_album, id_produtor) VALUES (?, ?, ?, ?)";
        $params = [
            $musicaData['nome'],
            $musicaData['tempo'],
            $musicaData['id_album'],
            $musicaData['id_produtor']
        ];
        return $db->execQuery($sql, $params);
    }

    public static function deleteMusica($id)
    {
        $db = new Db();
        $sql = "DELETE FROM Musica WHERE id_musica = ?";
        return $db->execQuery($sql, [$id]);
    }

    public static function updateMusica($id, $musicaData)
    {
        $db = new Db();
        $sql = "UPDATE Musica SET nome = ?, tempo = ?, id_album = ?, id_produtor = ? WHERE id_musica = ?";
        $params = [
            $musicaData['nome'],
            $musicaData['tempo'],
            $musicaData['id_album'],
            $musicaData['id_produtor'],
            $id
        ];
        return $db->execQuery($sql, $params);
    }
}