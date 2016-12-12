<?php
require './require.php';

if(!empty($_GET['type'])){
    $data = JsonHelper::read($_GET['type']);
    if($_GET['type'] == 'Base') {
        echo XmlHelper::responseBase($data);
    }else{
        if($_GET['type'] == 'Persons') {
            echo $data[0];
        }else {
            echo XmlHelper::response($data);
        }
    }
}
exit;