<?php

namespace app\models;

use app\core\Db;

class Artista
{
    /**
     * Adiciona um novo artista ao banco de dados.
     *
     * @param array $artistaData Dados do artista (nome e nacionalidade).
     * @return bool Resultado da execução da query.
     */
    public static function addArtista($artistaData)
    {
        $db = new Db();
        $sql = "INSERT INTO artista (nome, nacionalidade) VALUES (?, ?)";
        $params = [$artistaData['nome'], $artistaData['nacionalidade']];
        return $db->execQuery($sql, $params);
    }

    /**
     * Busca os dados de um artista pelo ID.
     *
     * @param int $id ID do artista.
     * @return array|null Retorna os dados do artista ou null se não encontrado.
     */
    public static function findArtistaById($id)
    {
        $db = new Db();
        $sql = "SELECT * FROM artista WHERE id_artista = ?";
        $result = $db->execQuery($sql, [$id]);
        return $result ? $result[0] : null;
    }

    /**
     * Atualiza os dados de um artista.
     *
     * @param int $id ID do artista a ser atualizado.
     * @param array $data Dados atualizados do artista.
     * @return bool Resultado da execução da query.
     */
    public static function updateArtista($id, $data)
    {
        $conn = new Db();
        $sql = 'UPDATE artista SET nome = ?, nacionalidade = ? WHERE id_artista = ?';
        return $conn->execQuery($sql, [
            $data['nome'],
            $data['nacionalidade'],
            $id
        ]);
    }

    /**
     * Obtém todos os artistas do banco de dados.
     *
     * @return array Lista de artistas.
     */
    public static function getAllArtistas()
    {
        $db = new Db();
        $sql = "SELECT * FROM artista";
        return $db->execQuery($sql);
    }

    /**
     * Remove um artista do banco de dados.
     *
     * @param int $id ID do artista a ser removido.
     * @return bool Resultado da execução da query.
     */
    public static function deleteArtista($id)
    {
        $db = new Db();
        $sql = "DELETE FROM artista WHERE id_artista = ?";
        return $db->execQuery($sql, [$id]);
    }

    /**
     * Pesquisa artistas pelo nome.
     *
     * @param string $searchTerm Termo de pesquisa para o nome.
     * @return array Lista de artistas que correspondem ao termo de pesquisa.
     */
    public static function searchArtistas($searchTerm)
    {
        $db = new Db();
        $sql = "SELECT * FROM artista WHERE nome LIKE ?";
        $params = ['%' . $searchTerm . '%']; // Pesquisa por nome que contenha o termo
        return $db->execQuery($sql, $params);
    }
}
