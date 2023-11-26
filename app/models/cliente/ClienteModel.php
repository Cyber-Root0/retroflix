<?php

namespace Retroflix\models\cliente;
use Retroflix\models\Model;
use Retroflix\Entity\Entity;
Class ClienteModel extends Model{
    
    protected string $table = "cliente";
    public function get(int $id) : array{
        
        $pdo =  $this->DB->execute("SELECT * FROM $this->table WHERE codigo = $id");

        if ( $pdo->rowCount() > 0) {
         return $pdo->fetch(\PDO::FETCH_ASSOC);
        }
 
        return [];

    }

    public function create(Entity $entity) : bool
    {
        $pdo =  $this->DB->execute("INSERT INTO $this->table (nome, email, senha, cpf, telefone, sexo, data_nascimento) VALUES ( 
            '{$entity->nome}',  
            '{$entity->email}', 
            '{$entity->senha}',
            '{$entity->cpf}',
            '{$entity->telefone}',
            '{$entity->sexo}',
            '{$entity->dataNascimento->format('y-m-d')}'
            )
        ");
    

        if ( $pdo->rowCount() > 0) {
         return true;
        }
 
        return false;
    }

    public function delete(int $id): bool{
        $pdo =  $this->DB->execute("DELETE FROM $this->table WHERE codigo = $id");

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
        $pdo =  $this->DB->execute("UPDATE $this->table
            SET 
                nome = '{$entity->nome}',
                email = '{$entity->email}',
                senha = '{$entity->senha}',
                cpf = '{$entity->cpf}',
                telefone = '{$entity->telefone}',
                sexo = '{$entity->sexo}',
                data_nascimento = '{$entity->dataNascimento->format('y-m-d')}'
            WHERE 
                codigo = {$entity->codigo}
        ");


        if ( $pdo->rowCount() > 0) {
         return true;
        }
 
        return false;

    }
    public function getAll(){
        $pdo =  $this->DB->execute("SELECT * FROM $this->table");

        if ( $pdo->rowCount() > 0) {
         return $pdo->fetchAll(\PDO::FETCH_ASSOC);
        }
 
        return [];
    }

    public function login(Entity $entity){
        $pdo = $this->DB->execute("SELECT * FROM $this->table WHERE email = '{$entity->email}' AND senha = '{$entity->senha}'");
        if ( $pdo->rowCount() > 0) {
            return $pdo->fetch(\PDO::FETCH_ASSOC);
           }
        return [];
    }

    public function statistic(){
        
        $pdo =  $this->DB->execute("SELECT COUNT(*) as 'montante' FROM {$this->table};");

        if ( $pdo->rowCount() > 0) {
         return $pdo->fetch(\PDO::FETCH_ASSOC);
        }
 
        return [];

    }


}