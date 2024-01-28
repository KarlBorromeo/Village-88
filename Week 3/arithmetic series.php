<?php
    $array = array(2, 5, 8, 11, 14);
    $result = 0;
    foreach($array as $num){
        $result += $num;
        echo $result. '<br>';
    }
    echo "result is : $result";
?>