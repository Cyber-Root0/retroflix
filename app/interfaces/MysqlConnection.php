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
}