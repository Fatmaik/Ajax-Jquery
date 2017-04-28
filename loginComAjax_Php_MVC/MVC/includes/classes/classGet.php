<?php
require_once 'classConnect.php';
class classGet {
    private $pdo;

    public function selAll() {
        $this->setPdo($db);
        $query = $this->getPdo->prepare("SELECT * FROM test1");
        $query->execute();
        return json_encode(['statsu']);
    }
    
    public function setPdo($pdo) {
        $this->pdo = $pdo;
    }
    public function getPdo() {
        return $this->pdo;
    }
}
$t = new ClassGet();
// echo $t->selAll();
echo json_encode($_GET);