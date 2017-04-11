<?php

if($_GET) {
    $name = $_GET['name'];
    $email = $_GET['email'];
    $tel = $_GET['tel'];
    

    
    if($name == "") {
        echo json_encode(["status"=>false, "msg"=>"Fill a name"]);exit;
    }
    if($email == "") {
        echo json_encode(["status"=>false, "msg"=>"Fill a email"]);exit;
    }
    if($tel == "") {
        echo json_encode(["status"=>false, "msg"=>"Fill a Tel"]);exit;
    }
    $id = insert($post);
    if(id) {
        echo json_encode(["status"=>true, "msg"=>"Success"]);exit;

    }else{
        echo json_encode(["status"=>true, "msg"=>"Falhou"]);exit;
    }
    
}
function conn() {
    try{
        return $pdo = new \PDO("mysql:dbname=farmacia;host=localhost", "root", "rancid");
    }catch(PDOException $e) {
        Echo "falhou: DB";
    }
}
function insert($post) {
    $con = conn();
    $ins = "INSERT INTO clientes SET nome = {$post['name']}, email = {$post['email']}, senha = {$post['tel']}";
    $query = $con->prepare($ins);
    // $query->bindValue("?", $post['name']);
    // $query->bindValue("?", $post['email']);
    // $query->bindValue("?", $post['tel']);
    $query->execute();
    return $con->lastInsertId();
}
