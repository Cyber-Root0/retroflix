<?php

require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../../app/config/config.php';

//simples renderização de dados da tabela

$ClientModel = new Retroflix\models\cliente\ClienteModel();

$cliente = new Retroflix\Entity\cliente\Cliente();


$cliente->nome = "";
$cliente->valor = "450";
$cliente->id = 1;

var_dump($ClientModel->getAll());