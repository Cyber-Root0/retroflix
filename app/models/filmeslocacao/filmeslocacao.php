<?php

namespace Retroflix\models\filmeslocacao;
use Retroflix\models\Model;
use Retroflix\Entity\Entity;
/**
 * Classe filha Cliente para exemplo
 */
class filmeslocacao extends Model{
    
    protected string $table = "filmes_locacao";

    public function get(int $id) : array{

        return [];

        
    }

    public function create(Entity $entity) : bool{
       $pdo =  $this->DB->execute("INSERT INTO $this->table 
       (codigo_locacao,codigo_filme,numero_dias,preco_diario,subtotal) VALUES ( 
        {$entity->codigo_locacao},        
        {$entity->codigo_filme},
        {$entity->numero_dias},
        '{$entity->preco_diario}',
        '{$entity->subtotal}'
        )");

       if ( $pdo->rowCount() > 0) {
        return true;
       }

       return false;

    }

    public function delete(int $id): bool{
       
        return false;

    }

    public function find(Entity $entity) : array{
        
        $pdo =  $this->DB->execute("SELECT * FROM $this->table WHERE titulo LIKE '%{$entity->titulo}%' ");

        if ( $pdo->rowCount() > 0) {
         return $pdo->fetchAll(\PDO::FETCH_ASSOC);
        }
 
        return [];
    }

    //não pode ser atualizado
    public function update(Entity $entity) : bool{
        
        return false;

    }
    public function getAll() : array{

        $pdo =  $this->DB->execute("SELECT * FROM $this->table");

        if ( $pdo->rowCount() > 0) {
         return $pdo->fetchAll(\PDO::FETCH_ASSOC);
        }
 
        return [];
       
    }

    public function getAllRelationByClienteID(int $id){

        $pdo =  $this->DB->execute(
        "SELECT 
         fl.codigo_filme, 
         f.titulo, f.imagem_capa,
         f.sinopse,
         g.nome as 'nome_genero', 
         d.nome as 'nome_diretor', 
         SUM(fl.numero_dias) AS total_dias 
            FROM filmes_locacao fl 
                JOIN Locacao l ON fl.codigo_locacao = l.codigo 
                JOIN filme f ON fl.codigo_filme = f.codigo 
                JOIN diretor d ON d.codigo = f.codigo_diretor 
                JOIN genero g ON g.codigo = f.codigo_genero 
            WHERE l.data_locacao + fl.numero_dias >= CURRENT_DATE 
                AND l.status_atual = 1 
                AND l.codigo_cliente = {$id} 
            GROUP BY fl.codigo_filme");
        if ( $pdo->rowCount() > 0) {
         return $pdo->fetchAll(\PDO::FETCH_ASSOC);
        }
 
        return [];

    }

}