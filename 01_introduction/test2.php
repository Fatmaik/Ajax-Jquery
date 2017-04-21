<?php

class Get{
    private $nome;
    private $email;
    private $tel;
    private $status;
    private $status1;
    private $count;
 
    public function info() {
        if($_GET) {
            $this->nome = $_GET['name'];
            $this->email = $_GET['email'];
            $this->tel = $_GET['tel'];
            
            // $sub = $_GET['sub'];
           
            if($this->nome == "") {
                $this->setStatus("Nao adicionou o nome:");
                $_GET['status'] = $this->getStatus();
                return json_encode($_GET);
            }
            if($this->email == "") {  
                $this->setStatus("Nao adicionou o email:");
                $_GET['status'] = $this->getStatus();
                return json_encode($_GET);
            }
            if($this->tel == "") {               
                $this->setStatus("Nao adicionou o telefone?");
                $_GET['status'] = $this->getStatus();
                return json_encode($_GET);
            }else{
                $this->setStatus("DONE");
                $_GET['status'] = $this->getStatus();
                return json_encode($_GET);
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
            $this->setStatus1("Cadastro concluido");
            $_GET['status1'] = $this->getStatus1();
            return json_encode($_GET);
        }else{
            $this->setStatus1("Cadastro nao Permitido : Os campos estao vazios ou ja existe este cadastro.");
            $_GET['status1'] = $this->getStatus1();
            return json_encode($_GET);
            
        } 
    }
    public function selectAll() {
        $pdo = $this->con();
        $query = $pdo->prepare("SELECT * FROM test1");
        $query->execute();
        $sel = $query->fetchAll(\PDO::FETCH_ASSOC);

        foreach($sel as $info) {
            $_GET["selId"] = "teste";//$info["id"];
        }
        return json_encode($_GET);
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
    public function setStatus($st) {
        $this->status = $st;
    }
    public function getStatus() {
        return $this->status;
    }
    public function setStatus1($st) {
        $this->status1 = $st;
    }
    public function getStatus1() {
        return $this->status1;
    }

    
   
}

$test = new Get();
echo $test->info();
$test->selectIgual();
       
    
 
