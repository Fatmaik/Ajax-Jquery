<?php
class ClassConnect {
    private $dsn = "mysql:dbname=test;host=localhost";
    private $dbuser ="root";
    private $dbpass ="rancid";

    public function Con() {
        try{
            return $pdo = new \PDO($this->dsn, $this->dbuser, $this->dbpass);           
        }catch(PDOException $e) {
            echo "Falha: " . $e.getMessage();
        }
    } 
}
$con = new ClassConnect();

