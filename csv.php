<?php 

function csv(){
    ini_set("allow_url_fopen", 1);
    $url = "https://dummyjson.com/products/search?q=Laptop";

    $json = file_get_contents($url);
    $obj = json_decode($json);
    $allData = array();
    $data = array();
    foreach($obj as $d){
        if(is_array($d)){
                array_push($allData,$d);
        }
    }
    foreach($allData[0] as $list){

        array_push($data,array($list->title.','.$list->price.','.$list->brand));
    }

    $headers = ['Title', 'Price', 'Brand'];
    $filename = 'laptop.csv';

    // open csv file for writing
    $f = fopen($filename, 'w');

    if ($f === false) {
        die('Error opening the file ' . $filename);
    }

    // write each row at a time to a file
    fputcsv($f, $headers);
    foreach ($data as $row) {
        fputcsv($f, $row);

    }

    // close the file
    fclose($f);

    echo json_encode(['success'=>true],200);

}


csv();
?>