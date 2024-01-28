<?php
    $cards['King'] = 13;
    $cards['Queen'] = 12;
    $cards['Jack'] = 11;
    $cards['Ace'] = 1;
    
    pair($cards);

    function pair($arr){
        echo 'List of Keys in the array: <br>';
        echo '<ul>';
        foreach($arr as $key => $value){
            echo "<li>$key</li>";
        }
        echo '</ul><br>';
        foreach($arr as $key => $value){
            echo "The value of $key in Pyramid Solitaire is $value <br>";
        }
    }
?>