<?php
require 'require.php';

if(!empty($_POST['type'])) {
    $type = $_POST['type'];
    if(in_array($_POST['type'], ['BigData', 'Brain', 'Cloud', 'Hat', 'Human'])
        && isset($_POST['key']) && !empty($_POST['name'])) {
        JsonHelper::save(intval($_POST['key']), $_POST['name'], $_POST['type']);
    }else if ($type == 'Base' && isset($_POST['key']) && !empty($_POST['title']) && !empty($_POST['num'])) {
        JsonHelper::saveBase(intval($_POST['key']), $_POST['title'], intval($_POST['num']), 0, intval($_POST['status']), $_POST['type']);
    }else if ($type == 'Persons' && !empty($_POST['num'])) {
        JsonHelper::write([$_POST['num']], 'Persons');
    }elseif ($type == 'All' && !empty($_POST['keys']) && isset($_POST['status'])) {
        JsonHelper::updateAll($_POST['keys'], $_POST['status']);
    }
}
exit;