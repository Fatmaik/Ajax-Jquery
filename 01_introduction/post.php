<?php
if($_GET) {
    $name = $_GET['name'];
    $email= $_GET['email'];
    $tel  = $_GET['tel'];
    
    if(sel($_GET)) {
        echo json_encode(["msg"=>"Error Cad", "status"=>false]);exit;
    }else{
        if($name == "") {
        echo json_encode(["msg"=>"Fill a name", "status"=>false]);exit;
        }
        if($email == "") {
            echo json_encode(["msg"=>"Fill a Email", "status"=>false]);exit;
        }
        if($tel == "") {
            echo json_encode(["msg"=>"Fill a telephone", "status"=>false]);exit;
        }else{
            $id = ins($_GET);
            echo json_encode(["msg"=>"Done", "status"=>"true"]);
        }
    }
    
    
};
function con() {
    try {
         return $dsn = new \PDO("mysql:dbname=test;host=localhost", "root", "rancid");
           
    }catch(PDOException $e){
        echo "erro db";
    }
}
function ins($data) {  
    $nome = $data['name'];
    $email = $data['email'];
    $tel = $data['tel'];

    $pdo = con();
    $query = $pdo->prepare("INSERT INTO test1 SET nome = :nome, email = :email, tel = :tel ");
    $query->bindParam(":nome", $nome);
    $query->bindParam(":email", $email);
    $query->bindParam(":tel", $tel);
    $query->execute();

}
function sel($nome) {
    $nome = $nome['nome'];
    $pdo = con();
    $sel = $pdo->prepare("SELECT * FROM test1 WHERE nome = :nome");
    $sel->bindParam(":nome", $nome);
    $sel->execute();
    if($sel->rowCount() > 0) {
        return "Usuario ja Cadastrado";
    }
}

    


































// con();
// ins($_GET);


// $status = "true";
//     echo $name . "Nome dentro da funcao Ins <br>";
//     echo $email ." <br>";
//     echo $tel . "<br>";