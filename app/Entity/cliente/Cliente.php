<?php

namespace Retroflix\Entity\cliente;
use Retroflix\Entity\Entity;

class Cliente extends Entity{

    public string $nome;
    public string $sobrenome;
    public float $valor; 

}