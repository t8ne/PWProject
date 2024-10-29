<?php

namespace app\models;

use app\core\Db;

class Produtor
{
    public static function getAllProdutores()
    {
        $conn = new Db();
        return $conn->execQuery('SELECT id_produtor, nome, nacionalidade FROM Produtor');
    }

    public static function findProdutorById(int $id)
    {
        $conn = new Db();
        $result = $conn->execQuery('SELECT id_produtor, nome, nacionalidade FROM Produtor WHERE id_produtor = ?', [$id]);
        return $result ? $result[0] : null;
    }

    public static function addProdutor($data)
    {
        $conn = new Db();
        $nome = $data['nome'] ?? '';
        $nacionalidade = $data['nacionalidade'] ?? '';
        $result = $conn->execQuery('INSERT INTO Produtor (nome, nacionalidade) VALUES (?, ?)', [$nome, $nacionalidade]);
        if ($result) {
            return ['id_produtor' => $result, 'nome' => $nome, 'nacionalidade' => $nacionalidade];
        }
        return null;
    }

    public static function updateProdutor($id, $data)
    {
        $conn = new Db();
        $nome = $data['nome'] ?? '';
        $nacionalidade = $data['nacionalidade'] ?? '';
        $result = $conn->execQuery('UPDATE Produtor SET nome = ?, nacionalidade = ? WHERE id_produtor = ?', [$nome, $nacionalidade, $id]);
        if ($result) {
            return ['id_produtor' => $id, 'nome' => $nome, 'nacionalidade' => $nacionalidade];
        }
        return null;
    }

    public static function deleteProdutor($id)
    {
        $conn = new Db();
        $produtor = self::findProdutorById($id);
        if ($produtor && $conn->execQuery('DELETE FROM Produtor WHERE id_produtor = ?', [$id])) {
            return $produtor;
        }
        return null;
    }
}