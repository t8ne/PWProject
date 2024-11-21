<?php

namespace app\models;

use app\core\Db;

class Produtor
{
    public static function getAllProdutores()
    {
        $db = new Db();
        $sql = "SELECT * FROM Produtor";
        return $db->execQuery($sql);
    }
/**
     * Encontra uma produtor pelo seu ID.
     */

    public static function findProdutorById(int $id)
    {
        $conn = new Db();
        $result = $conn->execQuery('SELECT id_produtor, nome, nacionalidade FROM produtor WHERE id_produtor = ?', [$id]);
        return $result ? $result[0] : null;
    }

    public static function addProdutor($data)
    {
        $conn = new Db();
        $sql = "INSERT INTO produtor (nome, nacionalidade) VALUES (?, ?)";
        return $conn->execQuery($sql, [
            $data['nome'],
            $data['nacionalidade'] ?? 'Desconhecido' // Valor padrão se 'nacionalidade' não estiver definida
        ]);


    }

    public static function updateProdutor($id, $data)
    {
        $conn = new Db();
        return $conn->execQuery('UPDATE produtor SET nome = ?, nacionalidade = ? WHERE id_produtor = ?', [
            $data['nome'],
            $data['nacionalidade'] ?? 'Desconhecido',
            $id
        ]);
    }


    public static function deleteProdutor($id)
    {
        $conn = new Db();
        $produtor = self::findProdutorById($id);
        if ($produtor && $conn->execQuery('DELETE FROM produtor WHERE id_produtor = ?', [$id])) {
            return $produtor;
        }
        return null;
    }

    public static function unsetProdutorInMusicas($produtorId)
    {
        $db = new Db();
        $sql = "UPDATE Musica SET id_produtor = NULL WHERE id_produtor = ?";
        return $db->execQuery($sql, [$produtorId]);
    }

}