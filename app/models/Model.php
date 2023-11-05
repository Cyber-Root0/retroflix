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
     * @return \InvalidArgumentException | array | bool
     */
    public function get(int $id) : \InvalidArgumentException | array | bool{
        
        if ($id === null || empty($id) || gettype($id) != "integer"){
            throw new \InvalidArgumentException("O registro não pode ser atualizado, id do objeto Entity {$this->table} inválido ou inexistente");
        }

        return $this->DB->prepare("SELECT * FROM {$this->table} WHERE id = ?", [$id])->fetch(\PDO::FETCH_ASSOC);

    }
    /**
     * Criar um novo registro com base nos dados da Entity
     *
     * @param  Entity $entity
     * @return bool
     */
    public function create(Entity $entity) : bool{

        $attr = [];
        $values = [];
        foreach($entity as $key => $value){

            $attr[] = $key;
            $values[] =  $value;

        }
        
        $Abstractfields = implode(', ', $attr);
        $Abstractsvalues = implode(', ', array_fill(0, count($values),'?'));
        $out = $this->DB->prepare("INSERT INTO {$this->table} ({$Abstractfields}) VALUES ({$Abstractsvalues})", $values);
        
        return $out->rowCount() > 0;

    }
    /**
     * Apagar um registro com base no ID
     *
     * @param  mixed $id
     * @return bool
     */
    public function delete(int $id): bool{
        
        $out = $this->DB->prepare("DELETE FROM {$this->table} WHERE id = ?", [$id]);
        if ($out->rowCount() > 0) {
            return true;
        }

        return false;

    }
    /**
     * Função para encontrar dados da tabela extendida 
     *
     * @param  Entity $entity
     * @return array | false
     */
    public function find(Entity $entity) : array | false{

        $attr = [];
        $values = [];

        foreach($entity as $key => $value){
            if ( $value === null || empty($value) ){
                continue;
            }

            $attr[] = $key;
            $values[] = $value;
        }

        if (count($values) <= 0) {
            return false;
        }

        $Abstractfields = implode("= ? AND ", $attr)."= ?";
        $out = $this->DB->prepare("SELECT * FROM {$this->table} WHERE {$Abstractfields}", $values);
        return $out->fetchAll(\PDO::FETCH_ASSOC);

    }
    /**
     * Função para atualizar registro com base no ID da Entity
     *
     * @param  Entity $entity
     * @return \Exception | bool
     */
    public function update(Entity $entity) : \Exception | bool{
        
        if ( !isset($entity->id) || empty($entity->id) || gettype($entity->id) != "integer"){
            throw new \InvalidArgumentException("O registro não pode ser atualizado, id do objeto Entity {$this->table} inválido ou inexistente");
        }

        $attr = [];
        $values = [];
        foreach($entity as $key => $value){

            $attr[] = $key;
            $values[] = $value;

        }

        $Abstractfields = implode("= ?,", $attr)."= ?";
        $values[count($values)] = $entity->id;

        $out = $this->DB->prepare("UPDATE {$this->table} SET {$Abstractfields} WHERE id = ?", $values);

        if ($out->rowCount() > 0) {
            return true;
        }

        return false;

    }    
    /**
     * Pegar todos os registro da tabela
     *
     * @return array
     */
    public function getAll(){

        return $this->DB->execute("SELECT * FROM {$this->table}")->fetchAll();

    }
}


