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
    }
    public function selAll() {
        $query = $this->pdo->prepare("SELECT * FROM test1");
        $query->execute();
        $sel = $query->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($sel);
    }
}
$Con = new ClassConnect();
$t = new ClassGet($Con);
echo $t->selAll();
