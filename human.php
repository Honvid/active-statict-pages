<?php
require 'require.php';
$type = 'Human';
$data = JsonHelper::read($type);
$filter = [1, 2, 6, 16, 44, 99, 101, 118, 120, 124];

require 'partial/header.php';
require 'partial/footer.php';
?>
