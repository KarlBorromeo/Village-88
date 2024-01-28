<?php
    $binary = array( 1, 1, 0, 1, 1, 0, 1); 
    $output = get_count($binary); 
    var_dump($output); 

    function get_count($arr){
        $one = 0;
        $zeroes = 0;
        foreach($arr as $num){
            if($num == 0){
                $zeroes++;
            }else{
                $one++;
            }
        }
        return array("zeroes" => $zeroes, "ones" => $one);
    }
?>