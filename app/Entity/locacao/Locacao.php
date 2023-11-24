<?php
namespace Retroflix\Entity\locacao;
use Retroflix\Entity\Entity;
/**
 * Extensão da Entity principal
 */
class Locacao extends Entity{

   public int $codigo;
   public \DateTime $data_locacao;
   public float $total;
   public int $status_atual;
   public int $codigo_cliente;
   public int $codigo_pagamento;

}