<?php

namespace APP\Model\DAO;

use APP\Model\Connection;
use PDO;

class JogadorDAO implements DAO
{
    public function insert($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('INSERT INTO tb_jogador VALUES(null,?, ?, ?, ?, ?, ?);');
        $stmt->bindParam(1, $object->nome);
        $stmt->bindParam(2, $object->nacionalidade);
        $stmt->bindParam(3, $object->time);
        $stmt->bindParam(4, $object->idade);
        $stmt->bindParam(5, $object->numero_camisa);
        $stmt->bindParam(6, $object->posicao);
        return $stmt->execute();
    }
    public function update($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('UPDATE tb_jogador SET nome=?, nacionalidade=?, time=?, idade=?, numero_camisa=?, posicao=? WHERE id_jogador=?;');
        $stmt->bindParam(1, $object->nome);
        $stmt->bindParam(2, $object->nacionalidade);
        $stmt->bindParam(3, $object->time);
        $stmt->bindParam(4, $object->idade);
        $stmt->bindParam(5, $object->numero_camisa);
        $stmt->bindParam(6, $object->posicao);
        $stmt->bindParam(7, $object->id);
        return $stmt->execute();
    }
    public function findAll()
    {
        $connection = Connection::getConnection();
        $rs = $connection->query('select * from tb_jogador');
        return $rs->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findOne($id)
    {
        $connection = Connection::getConnection();
        $rs = $connection->query("select * from tb_jogador where id_jogador = $id");
        return $rs->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($id)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('delete from tb_jogador where id_jogador = ?');
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}