<?php

class test{
    
    
    public function test2() {
        $_GET['banda'] = "NOFX";
        $_GET['Estilo'] = "HARDCORE";
        return json_encode($_GET);
    }
}
$tes = new test();
echo $tes->test2();