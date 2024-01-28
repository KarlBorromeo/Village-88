<?php
    $list1 = array(6, 1, 3, 5, 7);
    convert_to_blanks1($list1);
    function convert_to_blanks1($list){
        foreach($list as $num){
            for($i=1; $i<=$num; $i++){
                echo '_ ';
            }
            echo '<br>';
        }
    };
    echo '<hr>';
    $list2 = array(4, "Michael", 3, "Karen", 2, "Rogie");
    convert_to_blanks2($list2);
    function convert_to_blanks2($list){
        foreach($list as $num){
            if(is_numeric($num)){
                for($i=1; $i<=$num; $i++){
                    echo '_ ';
                }
            }else{
                for($i=1; $i<=strlen($num); $i++){
                    if($i==1){
                        echo $num[0]; 
                    }else{
                        echo '_ ';
                    }
                    
                }
            }
            echo '<br>';
        }
    }
?>