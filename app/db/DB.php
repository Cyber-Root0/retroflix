<?php
namespace Retroflix\db;
use Retroflix\interfaces\MysqlConnection;
class DB implements MysqlConnection{
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
     * Usa o prepare do PDO, definindo os parametros da Query com seus devidos tipos
     *
     * @param  string $abstractSql
     * @param  array $values
     * @return \PDOStatement | false
     */
    public function prepare(string $abstractSql, array $values = []) : \PDOStatement | false{

       $stmt =  $this->connection->prepare($abstractSql);
        
       $finalValues = array();

       foreach($values as $key => $value){
            
             $stmt->bindValue($key+1, $value, $this->objectType($value));   
       }
       try{   
            $stmt->execute();
            
            return $stmt;
        }catch(\PDOException $e){
            echo $e->getMessage();
            return false;
        }
        
    }
    /**
     * Executa uma string SQl direta e retorna ObjetoPDO
     *
     * @param string $sql
     * @return \PDOStatement | false
     */
    public function execute(string $sql): \PDOStatement | false{

        try{
            return $this->connection->query($sql);
        }catch(\PDOException $e){
            echo $e->getMessage();
            return false;
        }
       
    }
    /**
     * Retorna o tipo da variavel
     *
     * @param  mixed $var
     * @return int
     */
    private function objectType($var){

        return $this->fieldsType[gettype($var)];

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