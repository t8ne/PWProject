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
        return $conn->execQuery('SELECT * FROM Artista WHERE id_artista = ?', ['i', [$id]]);
    }

    public static function addArtista($data): bool
    {
        $conn = new Db();
        return $conn->execQuery('INSERT INTO Artista (nome) VALUES (?)', array(
            's',
            array($data['nome'])
        )) ? true : false;
    }

    public static function updateArtist($id, $data)
    {
        $conn = new Db();
        $result = $conn->execQuery('UPDATE Artist SET nome = ? WHERE id_artista = ?', [
            'si',
            [$data['nome'], $id]
        ]);

        // Verifica se a atualização foi bem-sucedida
        if ($result) {
            // Retorna os dados atualizados
            return $conn->execQuery('SELECT * FROM Artist WHERE id_artista = ?', ['i', [$id]]);
        }
        return false; // Retorna false se a atualização falhar
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
