<?php
    require 'require.php';
    $type = 'BigData';
    $data = JsonHelper::read($type);
    $filter = [15, 25, 21, 31, 34, 38, 49, 67, 72, 79, 80, 81, 85, 92, 99, 129];

    require 'partial/header.php';
    require 'partial/footer.php';
?>
