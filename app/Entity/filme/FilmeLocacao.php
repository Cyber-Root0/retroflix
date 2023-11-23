<?php

namespace Retroflix\Entity\filme;
use Retroflix\Entity\Entity;
/**
 * Extensão da Entity principal
 */
class FilmeLocacao extends Entity{

   public string $titulo;
   public int $codigo_locacao;
   public string $codigo_filme;
   public int $numero_dias;
   public float $preco_diario;
   public float $subtotal;
   public string $imagem_capa;
}