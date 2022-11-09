<?php
//QN.1 function;

require 'utility.php';

if(!isset($_GET['submit'])){
    $val = $_GET['val'];
    // echo $val;
    
    if(is_numeric($val)){

        $val = $val+0;

        if(is_float($val) != 'true'){
            // $result = intval($val);
            //we can use either of given function as both are alises of each other
            $data = is_integer($val);
            //$data = is_int($result); 
            echo json_encode($data);
        }else
        {
            echo json_encode('The value is float');
        }

    }else{
        echo json_encode('The value is not numeric');
    }
}

?>
<?php
//QN.1 function;

require 'utility.php';

if(!isset($_GET['submit'])){
    $val = $_GET['val'];
    // echo $val;
    
    if(is_numeric($val)){

        $val = $val+0;

        if(is_float($val) != 'true'){
            // $result = intval($val);
            //we can use either of given function as both are alises of each other
            $data = is_integer($val);
            //$data = is_int($result); 
            echo json_encode($data);
        }else
        {
            echo json_encode('The value is float');
        }

    }else{
        echo json_encode('The value is not numeric');
    }
}

?>