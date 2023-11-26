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

        
    /**
     * Comando pega todos os dados do filme, trazendo também o nome do genero e
     * do diretor
     * Codigo do genero está como codigo_genero
     * Codigo do Diretor está como codigo_diretor
     * nome_genero
     * nome_diretor
     * 
     * As demais colunas, estão com o nome padrão das colunos do filme na tabela do banco
     *
     * @return array
     */
    public function getAllWithRelation() : array{
        $pdo = $this->DB->execute("SELECT 
        f.*,
        g.nome as 'nome_genero',
        d.nome as 'nome_diretor'
    FROM $this->table f
    inner join genero g ON f.codigo_genero = g.codigo
    INNER JOIN diretor d ON f.codigo_diretor = d.codigo
    GROUP BY f.codigo;");

    if($pdo->rowCount() > 0) {
        return $pdo->fetchAll(\PDO::FETCH_ASSOC);
    }
    return [];

    }

    
    /**
     * Comando pega todos os dados do filme, trazendo também o nome do genero e
     * do diretor
     * Codigo do genero está como codigo_genero
     * Codigo do Diretor está como codigo_diretor
     * nome_genero
     * nome_diretor
     * 
     * Passa o parametro do código do filme a ser seleciona
     *
     * @param  mixed $idFilme
     * @return array
     */
    public function getRelationId(int $idFilme) : array{
        $pdo = $this->DB->execute("SELECT 
        f.*,
        g.nome as 'nome_genero',
        d.nome as 'nome_diretor'
    FROM $this->table f
    inner join genero g ON f.codigo_genero = g.codigo
    INNER JOIN diretor d ON f.codigo_diretor = d.codigo
    WHERE f.codigo = $idFilme
    GROUP BY f.codigo;");

    if($pdo->rowCount() > 0) {
        return $pdo->fetchAll(\PDO::FETCH_ASSOC);
    }
    return [];

    }

    public function findRelation(Entity $Filme) : array{
        $pdo = $this->DB->execute("SELECT
        f.*,
        g.nome as 'nome_genero',
        d.nome as 'nome_diretor'
    FROM filme f
    inner join genero g ON f.codigo_genero = g.codigo
    INNER JOIN diretor d ON f.codigo_diretor = d.codigo
    WHERE f.titulo LIKE '%{$Filme->pesquisa}%' OR g.nome LIKE '%{$Filme->pesquisa}%' OR d.nome LIKE '%{$Filme->pesquisa}%'
    GROUP BY f.codigo;
        ");

        if($pdo->rowCount() > 0) {
            return $pdo->fetchAll(\PDO::FETCH_ASSOC);
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