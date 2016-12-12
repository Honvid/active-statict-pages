<?php
require 'require.php';

if(!empty($_POST['type']) && isset($_POST['key']) && !empty($_POST['name'])) {
    if(in_array($_POST['type'], ['BigData', 'Brain', 'Cloud', 'Hat', 'Human'])) {
        JsonHelper::save(intval($_POST['key']), $_POST['name'], $_POST['type']);
        exit;
    }
}

if(!empty($_POST['type']) && isset($_POST['key']) && !empty($_POST['title']) && !empty($_POST['num'])) {
    if($_POST['type'] == 'Base') {
        JsonHelper::saveBase(intval($_POST['key']), $_POST['title'], intval($_POST['num']), 0, intval($_POST['status']), $_POST['type']);
    }
}