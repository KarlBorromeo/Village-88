<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title>Bingo</title>
    </head>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        .even{
            color: red;
        }
        .odd{
            color: blue;
        }
        .first{
            font-weight: bold;
        }
        div{
            border: 3px solid black;
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            border-radius: 5px;
            display: inline-block;
        }
        h1{
            padding: 1.32rem;
        }
        h1{
            display: inline-block;
        }
        td{
            border: 1px solid black;
            padding: 1.5rem;
        }
        .black{
            background-color: black;
            color: white;
        }
        .white{
            background-color: white;
            color: black;
        }
    </style>
    <body>
        <div>
        
<?php
            $arr = array('B','I','N','G','O');
            foreach($arr as $letter){
?>
            <?= '<h1>'.$letter. '</h1>'."\n" ?>
<?php
            }
?>
            <?= '<table>'."\n" ?>
                <?= '<tbody>' ?>
<?php               
            $rowInit = 2;
            for($i=1; $i<6; $i++){    
            $col = $rowInit;
?>
                <?= "\n"."\t"."\t"."\t"."\t"."\t".'<tr>' ?>
<?php                  
                $class = '';  
                for($j=1; $j<6; $j++){
                    
                    if($j==1){
                        if($i%2==0){
                            $class = "white";
                        }else{
                            $class = "black";
                        }                        
                    }else{
                        $before = $class;
                        if($before=='black'){
                            $class = "white";
                        }else{
                            $class = "black";
                        }        
                    }

?>
                <?= "\n"."\t"."\t"."\t"."\t"."\t"."\t".'<td class="'.$class.'">'.$col.'</td>' ?>
<?php
                    $col+= $rowInit;
                }   
?>     
                    <?= '</tr>'?>
<?php
                $rowInit++;
            }   
?>              
                <?= '</tbody>'."\n" ?>
            <?= '</table>' ?>

        </div>
    </body>
</html>