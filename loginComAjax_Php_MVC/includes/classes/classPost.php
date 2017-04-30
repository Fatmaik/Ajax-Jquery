<?php
require 'classConnect.php';
class ClassPost{
    private $nome;
    private $email;
    private $tel;
    private $pdo;
    private $count;
    
    public function __construct($pdo) {
        // pdo recebe metodo de conexao que esta na classe (classConnect)
        $this->pdo = $pdo->Con();
        // chamando metodo que verifica campos invalidos do form
        echo $this->Message(); 
    }
    public function Message() {
        if($_POST) {
            $this->nome = $_POST['name'];    // POST nome do formulario
            $this->email = $_POST['email'];  // POST email do formulario
            $this->tel = $_POST['tel'];      // POST tel do formulario
          
            // metodo para retornar se ja existe um email repetido cadastrado
            $this->selCount();

            if($this->nome == "") {
                $status = "Adicione o seu Nome";
                return json_encode(["status"=>$status]); 
            }
            if($this->email == "") {  
                $status = "Adicione o seu Email";
                return json_encode(["status"=>$status]); 
            }
            if($this->tel == "") {               
                $status = "Adicione o seu Telefone";
                return json_encode(["status"=>$status]);
            }
            if($this->getCount() > 0) {
                $status = "Este email ja possue usuario cadastrado";
                return json_encode(["status"=>$status]);
            }else{
                $this->Insert();
                return json_encode(["status"=>"Cadastro concluido"]); 
            }                 
         }   
    }
    public function selCount() {
        $query = $this->pdo->prepare("SELECT email FROM test1 where email = :email");
        $query->bindValue(":email", $this->getEmail());
        $query->execute();
        return $this->setCount($query->rowCount());
        
    }
    public function Insert() {
        $query = $this->pdo->prepare("INSERT INTO test1 SET nome = :nome, email = :email, tel = :tel");
        $query->bindValue(":nome", $this->getNome());
        $query->bindValue(":email", $this->getEmail());
        $query->bindValue(":tel", $this->getTel());
        $query->execute(); 
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
    public function setCount($count) {
        $this->count = $count;
    }
    public function getCount() {
        return $this->count;
    }
    public function setStatus($status) {
        $this->status =$status;
    }
    public function getStatus() {
        return $this->status;
    }
}
$Con = new ClassConnect();
$classPost = new ClassPost($Con);
