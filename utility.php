<?php 


function floorFloat($val,$precision)
{
    $float_array = explode('.',$val);
    $temp_val = 0;
    $new_val = [''];
    for ($i=0; $i<$precision; $i++) { 
        $temp = $float_array[1][$i];
        $temp_val = $temp_val*10+$temp;
        // $float_array[1] = $float_array[1]/10;
    }
    $new_val = array($float_array[0],$temp_val);
        
    return implode('.',$new_val);

}

function filter($pattern,$string){

    $result = preg_match_all('/'.$pattern.'/',$string);
    $result_array = explode($pattern,$string);
    $data = array('result'=>$result,'result_array'=>$result_array);
    return ($data);
}

?>