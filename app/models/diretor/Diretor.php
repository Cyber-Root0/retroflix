<?php

namespace Retroflix\models\diretor;
use Retroflix\models\Model;
use Retroflix\Entity\Entity;
/**
 * Classe filha Cliente para exemplo
 */
class Diretor extends Model{
    
    protected string $table = "diretor";

    public function get(int $id) : array{

        $pdo =  $this->DB->execute("SELECT * FROM $this->table WHERE codigo = $id");

        if ( $pdo->rowCount() > 0) {
         return $pdo->fetch(\PDO::FETCH_ASSOC);
        }
 
        return [];

        
    }

    public function create(Entity $entity) : bool{
     
       $pdo =  $this->DB->execute("INSERT INTO $this->table (nome) VALUES ( '{$entity->nome}'  ) ");

       if ( $pdo->rowCount() > 0) {
        return true;
       }

       return false;

    }

    public function delete(int $id): bool{
       
        $pdo =  $this->DB->execute(" DELETE FROM $this->table WHERE codigo = $id");

        if ( $pdo->rowCount() > 0) {
         return true;
        }
 
        return false;

    }

    public function find(Entity $entity) : array{
        
        $pdo =  $this->DB->execute("SELECT * FROM $this->table WHERE nome LIKE '%{$entity->nome}%' ");

        if ( $pdo->rowCount() > 0) {
         return $pdo->fetchAll(\PDO::FETCH_ASSOC);
        }
 
        return [];
    }

    public function update(Entity $entity) : bool{
        
        $pdo =  $this->DB->execute("UPDATE $this->table SET nome = '{$entity->nome}' WHERE codigo = {$entity->codigo}");

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