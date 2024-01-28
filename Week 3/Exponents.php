<?php
    $digits = array(3, 12, 30);
    function exponential($arr)
    {
        $arrNew = array();
        foreach($arr as $num){
            echo $num;
            array_push($arrNew,$num * $num * $num);
        }
        return $arrNew;
    }
    $result = exponential($digits);
    var_dump($result); 

    $digits = array(8,11, 4);
    function exponential($arr, $exp)
    {
        $arrNew = array();
        foreach($arr as $num){
            $result = $num;
            for($i = 1; $i<$exp; $i++){
                $result *= $num;
            }
            echo $result. '<br>';
            array_push($arrNew, $result);
        }
        return $arrNew;
    }
    $result = exponential($digits,4);
    var_dump($result); 
?>