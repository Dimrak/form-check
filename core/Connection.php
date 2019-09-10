<?php
namespace core;

class Connection
{
    private $pdo;
    private $sql = '';

    public function connect()
    {
        $host = '127.0.0.1';
        $db = '';
        $user = '';
        $pwrd = '';

        try {
            $pdo = new \PDO("mysql:host=$host; dbname=$db; charset=utf8", $user, $pwrd);
//         echo "Connected to DB " . $db;

        } catch (PDOException $e) {
            print 'ERROR: ' . $e->getMessage();
        }
        $this->pdo = $pdo;

    }
    public function insert($table, $columns, $values)
    {
        $this->sql .= "INSERT INTO $table ($columns) VALUES ($values)";
    }
    public function get()
    {
        $stmt = $this->execute();
        return $stmt->fetchObject();
    }
    public function execute()
    {
        $this->connect();
        $sql = $this->sql;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $this->sql = '';

        //debug mysql queries
//       echo "\nPDOStatement::errorInfo():\n";
//       $arr = $stmt->errorInfo();
//       print_r($arr);
//       echo "<br>" . "<br>";
        return $stmt;
    }
}