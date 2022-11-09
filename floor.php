<?php
include 'utility.php';

$val = $_GET['val'];
$precision = $_GET['precision'];
// echo $val;

echo json_encode(floorFloat($val,$precision));

?>