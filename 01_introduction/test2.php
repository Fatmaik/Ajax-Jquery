<?php

class POST{
    private $nome;
    private $email;
    private $tel;
    private $status;
    public $count;
    
    // metodo para conexao do database
    public function con() {
        try{
            return $dsn = new PDO("mysql:dbname=test;host=localhost", "root", "rancid");
        }catch(PDOException $e) {
            echo "falha Db:";
        }
    }
    // metodo de insert 
    public function insert() {
        $pdo = $this->con();
        
        $query = $pdo->prepare("INSERT INTO test1 SET nome = :nome, email = :email, tel = :tel");
        $query->bindValue(":nome",$this->getNome());
        $query->bindValue(":email", $this->getEmail());
        $query->bindValue(":tel", $this->getTel());
        $query->execute();
    }
    // metodo para comparacao, se ja existe uma conta semelhante cadastrada
    // se nao existir conflito no database o metodo cadastro chamao o metodo insert
    public function cadastro() {
        if($_POST) {
            $this->nome = $_POST['name'];    // POST nome do formulario
            $this->email = $_POST['email'];  // POST email do formulario
            $this->tel = $_POST['tel'];      // POST tel do formulario
          
            if($this->nome == "") {
                $this->setStatus("Nao adicionou o nome:");
                // $_POST['status'] = $this->getStatus();
                $status = $this->getStatus();
                return json_encode(["status"=>$status]); 
            }
            if($this->email == "") {  
                $this->setStatus("Nao adicionou o email:");
                // $_POST['status'] = $this->getStatus();
                // return json_encode($_POST);
                $status = $this->getStatus();
                return json_encode(["status"=>$status]); 
            }
            if($this->tel == "") {               
                $this->setStatus("Nao adicionou o telefone?");
                // $_POST['status'] = $this->getStatus();
                // return json_encode($_POST);
                $status = $this->getStatus();
                return json_encode(["status"=>$status]); 
            }else{
                $pdo = $this->con();
            
                $query = $pdo->prepare("SELECT * FROM test1 WHERE nome = :nome");
                $query->bindValue(":nome", $this->getNome());
                $query->execute();
                $this->setCount($query->rowCount());

                // condicao que compara cadastro ja existente e campos vazios   
                if($this->getCount() <= 0 && $this->getNome() != "" && $this->getEmail() != "" && $this->getTel() != "") {
                    $this->insert();
                    $this->setStatus("Cadastro concluido");
                    // $_POST['status'] = $this->getStatus();
                    // return json_encode($_POST);
                    $status = $this->getStatus();
                    return json_encode(["status"=>$status]); 
                }else{
                    $this->setStatus("Cadastro nao Permitido : Os campos estao vazios ou ja existe este cadastro.");
                    // $_POST['status'] = $this->getStatus();
                    // return json_encode($_POST);    
                    $status = $this->getStatus();
                    return json_encode(["status"=>$status]);      
                }                
            }
         }
        
    }
    public function selectAll() {
        $pdo = $this->con();
        $query = $pdo->prepare("SELECT * FROM test1");
        $query->execute();
        $sel = $query->fetchAll();
      
        return json_encode($sel);      
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

$test = new POST();
echo $test->cadastro() . $test->selectAll();



    
 
