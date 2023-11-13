<?php

namespace Retroflix\Entity;
/**
 * Entity - representa as os atributos e tipos da tabela
 */
abstract class Entity{
    public function __set($nome, $valor) {
        if (property_exists($this, $nome)) {
            $this->$nome = $valor;
        } else {
           $class_name = get_called_class();
            throw new \Exception("Atributo $nome não existe na classe {$class_name} ");
        }
    }

}