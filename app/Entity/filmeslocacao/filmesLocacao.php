<?php
namespace Retroflix\Entity\filmeslocacao;
use Retroflix\Entity\Entity;
/**
 * Extensão da Entity principal
 */
class filmesLocacao extends Entity{

   public int $codigo_locacao;
   public int $codigo_filme;
   public int $numero_dias;
   public float $preco_diario;
   public float $subtotal;

}
