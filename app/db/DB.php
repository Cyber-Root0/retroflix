<?php
namespace Retroflix\db;
class DB{
    /**
     * fieldsType
     *
     * @var array
     */
    protected $fieldsType = [
        "integer" => \PDO::PARAM_INT,
        "string" => \PDO::PARAM_STR,
        "boolean" => \PDO::PARAM_LOB,
        "double" => \PDO::PARAM_STR,
        "float" => \PDO::PARAM_STR
    ];    
    /**
     * connection
     *
     * @var \PDO
     */
    protected $connection;    
    /**
     * Construtor da classe
     *
     * @return void
     */
    public function __construct(){
        try{
             $this->connection = new \PDO("mysql:host=".DB_IP.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }

    }
    /**
     * Executa uma string SQl direta e retorna ObjetoPDO
     *
     * @param string $sql
     * @return \PDOStatement | false
     */
    public function execute(string $sql){

        try{
            return $this->connection->query($sql);
        }catch(\PDOException $e){
            echo $e->getMessage();
            return false;
        }
       
    }
    /**
     * Finaliza a conexão PDO após destruição da classe
     *
     * @return void
     */
    function __destruct(){
        
        $this->connection = null;
    }
}