<?php
require 'require.php';

if(!empty($_GET['type'])){
    $data = JsonHelper::read($_GET['type']);
    echo XmlHelper::respone($data);
    exit;
}else{
    $data = JsonHelper::read('Base');
    $temp = [];
    foreach ($data as $key => $value) {
        if($value['status']) {
            $temp[] = $value;
        }
    }
    echo XmlHelper::responeBase($temp);
    exit;
}