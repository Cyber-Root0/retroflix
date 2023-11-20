<?php

namespace Retroflix\Entity\filme;
use Retroflix\Entity\Entity;
/**
 * Extensão da Entity principal
 */
class Filme extends Entity{

   public int $codigo;
   public string $titulo;
   public \DateTime $data_lancamento;
   public string $sinopse;
   public string $imagem_capa;
   public int $codigo_diretor;
   public int $codigo_genero;
   public string $link;
   public float $preco_diario;  
   
   public string $pesquisa;

}