<?php

include 'utility.php';
$pattern = $_GET['pattern'];
$string = $_GET['data'];

echo json_encode(filter($pattern,$string));
  
?>