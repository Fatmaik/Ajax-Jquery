<?php
spl_autoload_register(function ($className) {
    if(file_exists($className.".php")) {
        require_once $className.".php";
    }
});
require 'classConnect.php';
class ClassPost{
    private $nome;
    private $email;
    private $tel;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo->Con();
        echo $this->Message(); 
    }

    public function Message() {
        if($_POST) {
            $this->setNome = $_POST['name'];
            $this->setEmail = $_POST['email'];
            $this->setTel = $_POST['tel'];

            if($_POST['name'] == "" || $_POST['name'] == "" || $_POST['tel'] == "") {
                $status = "Sentifique-se de que preencheu todos os campos.";
            }else{
                $this->selAll();
                
            }
            return json_encode([$_POST, 'status'=>$status] );
        }   
    }
    public function selAll() {
        $query = $this->pdo->prepare("SELECT nome FROM test1 where nome= :nome");
        $query->bindValue(":nome", $_POST['name']);
        $query->execute();
        return $sel = $query->fetchAll(\PDO::FETCH_ASSOC);
        
        if($sel->rowCount() > 0) {
            return $status = "Este usuario esta esta cadastrado,escolha outro email";
        }else{
            return $status = "Cadastro concluido.";            
        }
        
    }
    
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getNome() {
        return $this->nome;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setTel($tel) {
        $this->tel = $tel;
    }
    public function getTel() {
        return $this->tel;
    }
    public function setClassGet($classGet) {
        $this->classGet = $classGet;
    }
    public function getClassGet() {
        return $this->classGet;
    }
}
$Con = new ClassConnect();
$classPost = new ClassPost($Con);
// $classPost->Message();