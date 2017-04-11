<?php

class Get{
    private $nome;
    private $email;
    private $tel;
    private $count;
    
    
    public function info() {
        if($_GET) {
            $this->nome = $_GET['name'];
            $this->email = $_GET['email'];
            $this->tel = $_GET['tel'];
            $sub = $_GET['sub'];
      
            if($this->nome == "") {
                return "Preencha o nome:";exit;
            }
            if($this->email == "") {  
                return "Preencha o email:";exit;
            }
            if($this->tel == "") {               
                return "Preencha o telefone?";exit;
            }
         }
         
    }
    public function con() {
        try{
            return $dsn = new PDO("mysql:dbname=test;host=localhost", "root", "rancid");
        }catch(PDOException $e) {
            echo "falha Db:";
        }
    }
    public function insert() {
        $pdo = $this->con();
        
        $query = $pdo->prepare("INSERT INTO test1 SET nome = :nome, email = :email, tel = :tel");
        $query->bindValue(":nome",$this->getNome());
        $query->bindValue(":email", $this->getEmail());
        $query->bindValue(":tel", $this->getTel());
        $query->execute();
    }
    public function selectIgual() {
        $pdo = $this->con();
            
        $query = $pdo->prepare("SELECT * FROM test1 WHERE nome = :nome");
        $query->bindValue(":nome", $this->getNome());
        $query->execute();
        $this->setCount($query->rowCount());
            
        if($this->getCount() <= 0 && $this->getNome() != "" && $this->getEmail() != "" && $this->getTel() != "") {
            $this->insert();
            return "Cadastro concluido";
        }else{
            return  "Cadastro nao Permitido : Os campos estao vazios ou ja existe este cadastro.";exit;
        } 
    }
    
    public function getNome() {
        return $this->nome;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getTel() {
        return $this->tel;
    }
    public function getCount() {
        return $this->count;
    }
    public function setCount($c) {
        $this->count = $c;
    }
    
   
}
    

       
    
 
