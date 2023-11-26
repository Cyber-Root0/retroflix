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

        $pdo =  $this->DB->execute("SELECT l.codigo AS codigo_locacao, l.data_locacao, l.total, l.status_atual, c.nome AS nome_cliente, fp.descricao AS forma_pagamento 
        FROM Locacao l 
        INNER JOIN cliente c ON l.codigo_cliente = c.codigo 
        INNER JOIN forma_pagamento fp ON l.codigo_pagamento = fp.codigo WHERE l.codigo = $id;
        ");

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
        
        $pdo =  $this->DB->execute("
        
        SELECT l.codigo AS codigo_locacao, l.data_locacao, l.total, l.status_atual, c.nome AS nome_cliente, fp.descricao AS forma_pagamento 
        FROM Locacao l 
        INNER JOIN cliente c ON l.codigo_cliente = c.codigo 
        INNER JOIN forma_pagamento fp ON l.codigo_pagamento = fp.codigo WHERE c.nome LIKE '%{$entity->nome}%';
        
        
        ");

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

    public function getAllWithRelation(){

        $sql = "SELECT l.codigo AS codigo_locacao, l.data_locacao, l.total, l.status_atual, c.nome AS nome_cliente, fp.descricao AS forma_pagamento 
        FROM Locacao l 
        INNER JOIN cliente c ON l.codigo_cliente = c.codigo 
        INNER JOIN forma_pagamento fp ON l.codigo_pagamento = fp.codigo LIMIT 5;
        ";
        $pdo = $this->DB->execute($sql);
        if ( $pdo->rowCount() > 0) {
            return $pdo->fetchAll(\PDO::FETCH_ASSOC);
           }
    
        return [];
    }

    public function getAllWithRelationByClientID($id){

        $sql = "SELECT l.codigo AS codigo_locacao, l.data_locacao, l.total, l.status_atual, c.nome AS nome_cliente, fp.descricao AS forma_pagamento 
        FROM Locacao l 
        INNER JOIN cliente c ON l.codigo_cliente = c.codigo 
        INNER JOIN forma_pagamento fp ON l.codigo_pagamento = fp.codigo WHERE l.codigo_cliente=$id;
        ";
        $pdo = $this->DB->execute($sql);
        if ( $pdo->rowCount() > 0) {
            return $pdo->fetchAll(\PDO::FETCH_ASSOC);
           }
    
        return [];
    }

    public function statistic(){

        $pdo =  $this->DB->execute("SELECT SUM(total) as 'montante' FROM {$this->table};");

        if ( $pdo->rowCount() > 0) {
         return $pdo->fetch(\PDO::FETCH_ASSOC);
        }
 
        return [];

    }


}