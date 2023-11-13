<?php

namespace Retroflix\Entity\administrador;

use DateTime;
use Retroflix\Entity\Entity;
/**
 * Extensão da Entity principal
 */
class Administrador extends Entity{

    public int $codigo;
    public string $nome;
    public string $email;
    public string $senha; 
    public string $cpf; 
    public string $telefone; 
    public string $sexo; 
    public DateTime $data_nascimento; 

}