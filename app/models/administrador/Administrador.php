<?php

namespace Retroflix\models\administrador;
use Retroflix\models\Model;
use Retroflix\Entity\Entity;
/**
 * Classe filha Cliente para exemplo
 */
class Administrador extends Model{
    
    protected string $table = "administrador";

    public function get(int $id) : array {
        return [];
    }

    public function create(Entity $entity) : bool{
        $pdo = $this->DB->execute("INSERT INTO $this->table (nome, email, senha, cpf, telefone, sexo, data_nascimento) 
            VALUES 
            ( '{$entity->nome}', '{$entity->email}', '{$entity->senha}', '{$entity->cpf}', '{$entity->telefone}', '{$entity->sexo}', '{$entity->data_nascimento}')"
            );
        
        if ($pdo->rowCount() > 0) {
            return true;
        }
        return false;

    }

    public function delete(int $id): bool {
        return true;
    }

    public function find(Entity $entity) : array {
        return [];
    }

    public function update(Entity $entity) : bool {
        return true;
    }

    public function getAll() : array  {
        return [];
    }

}