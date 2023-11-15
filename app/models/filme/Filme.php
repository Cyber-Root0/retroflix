<?php

namespace Retroflix\models\filme;
use Retroflix\models\Model;
use Retroflix\Entity\Entity;
/**
 * Classe filha Cliente para exemplo
 */
class Filme extends Model{
    
    protected string $table = "filme";

    public function get(int $id) : array{

        $pdo =  $this->DB->execute("SELECT * FROM $this->table WHERE codigo = $id");

        if ( $pdo->rowCount() > 0) {
         return $pdo->fetch(\PDO::FETCH_ASSOC);
        }
 
        return [];

        
    }

    public function create(Entity $entity) : bool{
     
       $pdo =  $this->DB->execute("INSERT INTO $this->table (titulo,data_lancamento, sinopse, imagem_capa, codigo_diretor, codigo_genero, link, preco_diario ) VALUES ( 
        '{$entity->titulo}',
        '{$entity->data_lancamento->format('y-m-d')}',
        '{$entity->sinopse}',
        '{$entity->imagem_capa}',
         {$entity->codigo_diretor},
         {$entity->codigo_genero},
        '{$entity->link}',
        '{$entity->preco_diario}'
        )");

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
        
        $pdo =  $this->DB->execute("SELECT * FROM $this->table WHERE titulo LIKE '%{$entity->titulo}%' ");

        if ( $pdo->rowCount() > 0) {
         return $pdo->fetchAll(\PDO::FETCH_ASSOC);
        }
 
        return [];
    }

    public function update(Entity $entity) : bool{
        
    $pdo =  $this->DB->execute("UPDATE $this->table SET 
       titulo = '{$entity->titulo}',
       data_lancamento = '{$entity->data_lancamento->format('y-m-d')}',
       sinopse = '{$entity->sinopse}',
       imagem_capa = '{$entity->imagem_capa}',
       codigo_diretor = {$entity->codigo_diretor},
       codigo_genero = {$entity->codigo_genero},
       link = '{$entity->link}',
       preco_diario = '{$entity->preco_diario}'
       WHERE codigo = {$entity->codigo}");

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