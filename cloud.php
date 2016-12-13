<?php
require 'require.php';
$type = 'Cloud';
$data = JsonHelper::read($type);
$filter = [2, 59, 74, 78, 93, 199, 208, 214, 213, 235,];

require 'partial/header.php';
require 'partial/footer.php';
?>
