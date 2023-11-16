<?php

namespace Retroflix\Entity\cliente;
use Retroflix\Entity\Entity;
/**
 * Extensão da Entity principal
 */
class Cliente extends Entity{

    //ATRIBUTOS:
    public int $codigo;
    public  string $nome;
    public  string $email;
    public string $senha;
    public string $cpf;
    public string $telefone;
    public string $sexo;
    public \DateTime $dataNascimento;


}