<?php

namespace Retroflix\interfaces;

interface MysqlConnection{
    /**
     * Execução de uma consulta SQL direta
     *
     * @param  string $sql
     * @return \PDOStatement
     */
    public function execute(string $sql) : \PDOStatement | false;    
    /**
     * Executa query por meio da abstração de dados do PDO
     *
     * @param  string $abstractSql
     * @param  array $params
     * @return \PDOStatement
     */
    public function prepare(string $abstractSql, array $params = []) : \PDOStatement | false;
}