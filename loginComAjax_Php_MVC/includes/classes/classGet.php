<?php
spl_autoload_register(function ($className) {
    if(file_exists($className.".php")) {
        require_once $className.".php";
    }
});

class classGet {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo->Con();
        echo $this->selAll();       
    }
    public function selAll() {
        $query = $this->pdo->prepare("SELECT * FROM test1");
        $query->execute();
        $sel = $query->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($sel);
    }
}
$Con = new ClassConnect();
$classGet = new ClassGet($Con);
// echo $classGet->selAll();
