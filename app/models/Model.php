<?php

namespace Retroflix\models;
use Retroflix\interfaces\ModelInterface;
use Retroflix\db\DB;
use Retroflix\Entity\Entity;
/**
 * Classe Anstrata Model para ler e tratar dados da tabela extendida
 */
abstract class Model implements ModelInterface{

    protected DB $DB;
    protected string $table = "";
    /**
     * Construtor da Classe
     *
     * @return void
     */
    public function __construct(){

        $this->DB = new DB();
    }    
    /**
     * Pegar um registro com base em um ID especificado
     *
     * @param  int $id
     * @return array
     */
    abstract public function get(int $id) : array;
    /**
     * Criar um novo registro com base nos dados da Entity
     *
     * @param  Entity $entity
     * @return bool
     */
    abstract public function create(Entity $entity) : bool;
    /**
     * Apagar um registro com base no ID
     *
     * @param  mixed $id
     * @return bool
     */
    abstract public function delete(int $id): bool;
    /**
     * Função para encontrar dados da tabela extendida 
     *
     * @param  Entity $entity
     * @return array
     */
    abstract public function find(Entity $entity) : array;
    /**
     * Função para atualizar registro com base no ID da Entity
     *
     * @param  Entity $entity
     * @return bool
     */
    abstract public function update(Entity $entity) : bool;
    /**
     * Pegar todos os registro da tabela
     *
     * @return array
     */
    abstract public function getAll();
}


