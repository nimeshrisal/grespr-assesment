<?php

$data = $_GET['date'];


if(DateTime::createFromFormat('M d Y', $data) != false) {
    $date = date_create($data);
    echo json_encode(date_format($date, 'Y-m-d'));
  }
  elseif(is_numeric($data)) {
    $date = DateTime::createFromFormat('dmY', $data);
    // echo json_encode($date);
    echo json_encode(date_format($date, 'M-d-Y'));
    

}else{

    echo json_encode('Invalid Format!"');
}


?>