<?php

namespace App\DAO\MySQL\SmartSistemasGerenciadordeProdutos;

abstract class Conexao
{
    /**
     * @var \PDO
     */
    protected $pdo;

    public function __construct()
    {
        $host = getenv('TESTESMART_MYSQL_HOST');
        $port = getenv('TESTESMART_MYSQL_PORT');
        $user = getenv('TESTESMART_MYSQL_USER');
        $pass = getenv('TESTESMART_MYSQL_PASSWORD');
        $dbname = getenv('TESTESMART_MYSQL_DBNAME');

        $dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

        $this->pdo = new \PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}
