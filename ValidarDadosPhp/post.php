<?php

if($_GET) {
    $name = $_GET['name'];
    $email = $_GET['email'];
    $tel = $_GET['tel'];
    
    if($name == "") {
        echo json_encode(["status"=>false, "msg"=>"Fill a name"]);exit;
    }
    if($email == "") {
        echo json_encode(["status"=>FALSE, "msg"=>"Fill a email"]);exit;
    }
    if($tel == "") {
        echo json_encode(["status"=>FALSE, "msg"=>"Fill a Tel"]);exit;
    }
    echo json_encode(["status"=>TRUE, "msg"=>"Success"]);exit;
    // echo json_encode($_POST);exit;
}

