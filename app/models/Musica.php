<?php

namespace app\models;

use app\core\Db;

class Musica
{
    public static function getAllMusicas()
    {
        $conn = new Db();
        return $conn->execQuery('SELECT id_musica, nome, tempo, id_album FROM Musica');
    }

    public static function findMusicaById(int $id)
    {
        $conn = new Db();
        return $conn->execQuery('SELECT id_musica, nome, tempo, id_album FROM Musica WHERE id_musica = ?', array('i', array($id)));
    }

    public static function addMusica($data): bool
    {
        $conn = new Db();
        return $conn->execQuery('INSERT INTO Musica (nome, tempo, id_album) VALUES (?, ?, ?)', array(
            'ssi',
            array($data['nome'], $data['tempo'], $data['id_album'])
        )) ? true : false;
    }

    public static function updateMusica($id, $data): bool
    {
        $conn = new Db();
        return $conn->execQuery('UPDATE Musica SET nome = ?, tempo = ?, id_album = ? WHERE id_musica = ?', array(
            'ssii',
            array($data['nome'], $data['tempo'], $data['id_album'], $id)
        )) ? true : false;
    }

    public static function deleteMusica($id): bool
    {
        $conn = new Db();
        return $conn->execQuery('DELETE FROM Musica WHERE id_musica = ?', array(
            'i',
            array($id)
        )) ? true : false;
    }
}
