<?php
require 'require.php';
$type = 'Brain';
$data = JsonHelper::read($type);
$filter = [3, 8, 9, 26, 33, 50, 62, 69, 107, 118];

require 'partial/header.php';
require 'partial/footer.php';
?>
