<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class BDD
{
    private $bdd;
    private string $db_host = '172.21.0.2'; //MAC = 172.21.0.2
    private string $db = 'lrimmo';
    private string $db_login = 'root';
    private string $db_pass = 'root';
    private string $db_charset = "utf8mb4";
    private int $db_port = 3306;
    private $con;
    private array $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false];

    public function __construct()
    {
        $this->con = "mysql:host=$this->db_host;port=$this->db_port;dbname=$this->db;charset=$this->db_charset;";
        try {
            $this->bdd = new PDO($this->con, $this->db_login, $this->db_pass, $this->options);
        } catch (
        \PDOException $e
        ) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function bdQuery($query, $params): PDOStatement
    {
        try {
            $stmt = $this->bdd->prepare($query);
            $stmt->execute($params);
            return $stmt;
            echo "passé";
        } catch (PDOException $e) {
            echo "Erreur SQL : " . $e->getMessage();
             throw $e;
        }
    }

    public function checkDouble($table, $column, $value): bool
    {
        $sql = "SELECT * FROM $table WHERE $column = :value";
        $params = ['value' => $value];
        $stmt = $this->bdQuery($sql, $params);
        $result = $stmt->fetch();
        return $result !== false; // renvoie true si existe sinon false
    }
}

