<?php
    $array = array(13, 143, 88, 65, 120);
    $sum = 0;
    foreach($array as $num){
        $sum += $num;
    };
    $length = count($array);
    echo "sum is : $sum <br>";
    echo "length is : $length <br>";
    echo 'Mean is ' . $sum/$length;
?>