<?php
spl_autoload_register(function ($className) {
    if(file_exists($className.".php")) {
        require_once ($className.".php");
    }
});

class ClassPost {
    private $nome;
    private $email;
    private $tel;

    public function Message() {
        if($_POST) {
            $this->setNome = $_POST['name'];
            $this->setEmail = $_POST['email'];
            $this->setTel = $_POST['tel'];
            return json_encode($_POST);
        }else{
            return "Nao tem nome";
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
}
$x = new ClassPost();

echo $x->Message();