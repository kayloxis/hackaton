<?php

namespace Project\Services;

class Connect
{
    public $pdo;

    public function __construct()
    {
        if($this->pdo == null){
            $dbConfig = (require __DIR__ . '/../../settings.php')['db'];
            $this -> pdo = new \PDO(
                'mysql:host==' . $dbConfig['host'] . ';dbname=' . $dbConfig['dbname'],
                $dbConfig['user'],
                $dbConfig['password']
            );
            $this -> pdo -> exec('SET NAMES UTF8');
        }
    }

    public function query (string $sql, array $params = [])
    {
        $sth = $this -> pdo -> prepare($sql);
        $res = $sth -> execute($params);
        if ($res === false)
        {
            return null;
        }

        return $sth -> fetchAll();
    }
}