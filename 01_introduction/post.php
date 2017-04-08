<?php

if($_GET) {
    $_GET['name'] = $_GET['name'] . " TEST";
    $_GET['email']= $_GET['email'] . " TEST";
    $_GET['tel']  = $_GET['tel'] . " 86868686";
    echo json_encode($_GET);exit;
}

