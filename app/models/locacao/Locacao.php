<?php

namespace Retroflix\models\locacao;
use Retroflix\models\Model;
use Retroflix\Entity\Entity;
/**
 * Classe filha Cliente para exemplo
 */
class Locacao extends Model{
    
    protected string $table = "locacao";

    public function get(int $id) : array{

        $pdo =  $this->DB->execute("SELECT * FROM $this->table WHERE codigo = $id");

        if ( $pdo->rowCount() > 0) {
         return $pdo->fetch(\PDO::FETCH_ASSOC);
        }
 
        return [];

        
    }

    public function create(Entity $entity) : bool{
     
       $pdo =  $this->DB->execute("INSERT INTO $this->table (data_locacao,total,status_atual,codigo_cliente,codigo_pagamento) VALUES ( 
        '{$entity->data_locacao->format('Y-m-d')}',
        '{$entity->total}',
        $entity->status_atual,
        $entity->codigo_cliente,
        $entity->codigo_pagamento
        ) ");

       if ( $pdo->rowCount() > 0) {
        return true;
       }

       return false;

    }

    public function lastIdInsert(){
        return $this->DB->getLastId();
    }
    public function delete(int $id): bool{
       
        $pdo =  $this->DB->execute(" DELETE FROM $this->table WHERE codigo = $id");

        if ( $pdo->rowCount() > 0) {
         return true;
        }
 
        return false;

    }

    public function find(Entity $entity) : array{
        
        $pdo =  $this->DB->execute("SELECT * FROM $this->table WHERE codigo LIKE '%{$entity->codigo}%' ");

        if ( $pdo->rowCount() > 0) {
         return $pdo->fetchAll(\PDO::FETCH_ASSOC);
        }
 
        return [];
    }

    // atualização do status somente
    public function update(Entity $entity) : bool{
        
        $pdo =  $this->DB->execute("UPDATE $this->table SET status_atual = {$entity->status_atual} WHERE codigo = {$entity->codigo}");

        if ( $pdo->rowCount() > 0) {
         return true;
        }
 
        return false;
        
    }
    public function getAll() : array{

        $pdo =  $this->DB->execute("SELECT * FROM $this->table");

        if ( $pdo->rowCount() > 0) {
         return $pdo->fetchAll(\PDO::FETCH_ASSOC);
        }
 
        return [];
       
    }


}