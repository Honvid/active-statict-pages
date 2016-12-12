<?php
require 'require.php';
$type = 'Brain';
$data = JsonHelper::read($type);
$filter = [5, 10, 20, 30];

require 'partial/header.php';
require 'partial/footer.php';
?>
