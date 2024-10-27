<?php

namespace app\models;

use app\core\Db;

class Album
{
    public static function getAllAlbums()
    {
        $conn = new Db();
        return $conn->execQuery('SELECT id_album, nome, data, id_artista FROM Album');
    }

    public static function findAlbumById(int $id)
    {
        $conn = new Db();
        return $conn->execQuery('SELECT id_album, nome, data, id_artista FROM Album WHERE id_album = ?', ['i', [$id]]);
    }

    public static function addAlbum($data): bool
    {
        $conn = new Db();
        return $conn->execQuery('INSERT INTO Album (nome, data, id_artista) VALUES (?, ?, ?)', [
            'ssi',
            [$data['nome'], $data['data'], $data['id_artista']]
        ]) ? true : false;
    }

    public static function updateAlbum($id, $data): bool
    {
        $conn = new Db();
        // Execute the update query
        $result = $conn->execQuery('UPDATE Album SET nome = ?, data = ?, id_artista = ? WHERE id_album = ?', array(
            'ssii',
            array($data['nome'], $data['data'], $data['id_artista'], $id)
        ));

        // Check if the update was successful
        if ($result) {
            // The operation was successful
            return true; // Return true on success
        }
        // Return false if the operation failed
        return false;
    }



    public static function deleteAlbum($id): bool
{
    $conn = new Db();
    // Execute the delete query
    return $conn->execQuery('DELETE FROM Album WHERE id_album = ?', array(
        'i',
        array($id)
    )) ? true : false; // Returns true if the delete was successful, false otherwise
}

}
