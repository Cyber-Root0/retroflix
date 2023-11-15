<?php

namespace Retroflix\models\fpagamento;

use Retroflix\models\Model;
use Retroflix\Entity\Entity;

class FPagamento extends Model{
    //implementando os métodos
    protected string $table = "forma_pagamento";
    //get
    public function get(int $id): array{
        $pdo = $this->DB->execute("SELECT * FROM $this->table WHERE codigo = $id");

        if($pdo->rowCount() >0){
            return $pdo->fetch(\PDO::FETCH_ASSOC);
        }

        return [];
    }

    //INSERT
    public function create(Entity $entity): bool{
        $pdo = $this->DB->execute("INSERT INTO $this->table (descricao) VALUES ('{$entity->descricao}')");

        if($pdo->rowCount() > 0){
            return true;
        }

        return false;
    }
    //delete
    public function delete(int $id): bool{
        $pdo= $this->DB->execute(" DELETE FROM $this->table WHERE codigo = $id");

        if($pdo->rowCount() >0){
            return true;
        }

        return false;
    }

    public function find(Entity $entity): array{

        $pdo = $this->DB->execute("SELECT * FROM $this->table WHERE descricao LIKE '%{$entity->descricao}%' ");

        if($pdo->rowCount() > 0){
            return $pdo->fetchAll(\PDO::FETCH_ASSOC);
        
        }

        return [];

    }

    public function update(Entity $entity): bool{

        $pdo = $this->DB->execute("UPDATE $this->table SET descricao = '{$entity->descricao}' WHERE codigo = {$entity->codigo}");

        if($pdo->rowCount() > 0){
            return true;
        }

        return false;
    }


    public function getAll(): array{
    
        $pdo =  $this->DB->execute("SELECT * FROM $this->table");

        if ( $pdo->rowCount() > 0) {
            return $pdo->fetchAll(\PDO::FETCH_ASSOC);
        }
    
        return [];
    }
}




?>