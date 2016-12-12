<?php
require 'require.php';

if(!empty($_GET['type']) && $_GET['type'] != 'Base'){
    $data = JsonHelper::read($_GET['type']);
    echo XmlHelper::response($data);
    exit;
}else{
    $data = JsonHelper::read('Base');
    $temp = [];
    foreach ($data as $key => $value) {
        if($value['status']) {
            $temp[] = $value;
        }
    }
    echo XmlHelper::responseBase($temp);
    exit;
}