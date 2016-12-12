<?php
require 'require.php';

if(!empty($_GET['type'])){
    $data = JsonHelper::read($_GET['type']);
    if($_GET['type'] == 'Base') {
        $temp = [];
        foreach ($data as $key => $value) {
            if($value['status']) {
                $temp[$key] = $value;
            }
        }
        echo XmlHelper::responseBase($temp);
    }else{
        if($_GET['type'] == 'Persons') {
            echo $data[0];
        }else {
            echo XmlHelper::response($data);
        }
    }
}
exit;