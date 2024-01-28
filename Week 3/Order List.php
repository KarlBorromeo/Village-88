<?php
    $x = array('Spaghetti', 'Pizza', 'Iced tea');
    print_orders($x);
    function print_orders($arr){
        echo "<ol>\n";
        foreach($arr as $item){
            echo "\t<li> $item </li>\n";
        }
        echo "</ol>";
    };
?>