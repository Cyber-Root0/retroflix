<?php

namespace Retroflix\models;
use Retroflix\interfaces\ModelInterface;
use Retroflix\db\DB;
use Retroflix\Entity\Entity;
abstract class Model implements ModelInterface{

    protected DB $DB;
    protected string $table = "";

    public function __construct(){

        $this->DB = new DB();
    }
    public function get(int $id) : \InvalidArgumentException | array | bool{
        
        if ($id === null || empty($id) || gettype($id) != "integer"){
            throw new \InvalidArgumentException("O registro não pode ser atualizado, id do objeto Entity {$this->table} inválido ou inexistente");
        }

        return $this->DB->prepare("SELECT * FROM {$this->table} WHERE id = ?", [$id])->fetch(\PDO::FETCH_ASSOC);

    }

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

    public function delete(int $id): bool{
        
        $out = $this->DB->prepare("DELETE FROM {$this->table} WHERE id = ?", [$id]);
        if ($out->rowCount() > 0) {
            return true;
        }

        return false;

    }

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
    public function getAll(){

        return $this->DB->execute("SELECT * FROM {$this->table}")->fetchAll();

    }
}


