<?php
class ClassConnect {
    private $dsn = "mysql:dbname=test;host=localhost";
    private $dbuser ="root";
    private $dbpass ="rancid";

    public function Con() {
        try{
            return $pdo = new \PDO($this->dsn, $this->dbuser, $this->dbpass);           
            echo "conectado";
        }catch(PDOException $e) {
            echo "Falha: " . $e.getMessage();
        }
    }

    public function selAll() {
        $query = $this->pdo->prepare("SELECT * FROM test1");
        $query->execute();
        $sel = $query->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($sel);
    }
}
$con = new ClassConnect();

