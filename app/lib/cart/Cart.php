<?php
namespace Retroflix\lib\cart;
use  Retroflix\Entity\filme\FilmeLocacao as Filme;
class Cart{
    public function __construct(){
        @session_start();
        if (!isset($_SESSION["cart"])){
            $_SESSION["cart"] = array();
        }
    }
    public function add(Filme $filme){
        if ( count($_SESSION["cart"]) > 0 ){

            //atualiza o filme no carrinho caso ja exista
            if (isset($_SESSION["cart"][$filme->codigo_filme])){
                $_SESSION["cart"][$filme->codigo_filme]["numero_dias"]++;
                $_SESSION["cart"][$filme->codigo_filme]["subtotal"] = 
                $_SESSION["cart"][$filme->codigo_filme]["numero_dias"] * $filme->preco_diario;
            //se não existir, cria
            }else{
                $_SESSION["cart"][$filme->codigo_filme]["img"] = $filme->imagem_capa;
                $_SESSION["cart"][$filme->codigo_filme]["titulo"] = $filme->titulo;
                $_SESSION["cart"][$filme->codigo_filme]["numero_dias"] = $filme->numero_dias;
                $_SESSION["cart"][$filme->codigo_filme]["preco_diario"] = $filme->preco_diario;
                $_SESSION["cart"][$filme->codigo_filme]["subtotal"] = $filme->numero_dias * $filme->preco_diario;
            }
        //se o carrinho estiver vazio, adiciona o primeiro elemento
        }else{
            $_SESSION["cart"][$filme->codigo_filme]["img"] = $filme->imagem_capa;
            $_SESSION["cart"][$filme->codigo_filme]["titulo"] = $filme->titulo;
            $_SESSION["cart"][$filme->codigo_filme]["numero_dias"] = $filme->numero_dias;
            $_SESSION["cart"][$filme->codigo_filme]["preco_diario"] = $filme->preco_diario;
            $_SESSION["cart"][$filme->codigo_filme]["subtotal"] = $filme->numero_dias * $filme->preco_diario;
        }

    }
    public function update(Filme $filme){

        if (isset($_SESSION["cart"][$filme->codigo_filme])){

            $_SESSION["cart"][$filme->codigo_filme]["numero_dias"] = $filme->numero_dias;
            $_SESSION["cart"][$filme->codigo_filme]["preco_diario"] = $filme->preco_diario;
            $_SESSION["cart"][$filme->codigo_filme]["subtotal"] = $filme->numero_dias * $filme->preco_diario;
            return true;
        }
        return false;

    }
    public function getAll(){

        if ( count($_SESSION["cart"]) > 0 ){
            return $_SESSION["cart"];
        }
        return [];

    }
    public function delete($id){
        if (isset($_SESSION["cart"][$id])){
            unset($_SESSION["cart"][$id]);
            return true;
        }

        return false;
    }

    public function getTotal(){
        $total=0;
        $filmes = $this->getAll();
        foreach($filmes as $filme){
            $total+= $filme["subtotal"];
        }
        return $total;

    }

    public function deleteAll(){

        unset($_SESSION['cart']);
    }

}