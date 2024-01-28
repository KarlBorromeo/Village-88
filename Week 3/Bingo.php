<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title>Bingo</title>
    </head>
    <style>
        .even{
            color: red;
        }
        .odd{
            color: blue;
        }
        .first{
            font-weight: bold;
        }
    </style>
    <body>
        <?php
                echo "<table>";
                echo "<thead>";
                echo "<tr><td>B</td><td>I</td><td>N</td><td>G</td><td>O</td></tr>";
                echo "</thead>\n";
                echo "<tbody>\n";
                for($i=2; $i<=6; $i++){
                    if($i%2==0){
                        if($i ==2){
                            echo "<tr class='even first'>"; 
                        }else{
                            echo "<tr class='even'>"; 
                        }                
                    }else{
                        echo "<tr class='odd'>";
                    }                  
                    for($j=$i; $j<=$i*5; $j+=$i){
                        echo "\t<td>$j</td>";
                    }
                    echo "</tr>\n";
                }
                echo "<tbody>\n";
                echo "</table>\n";
        ?>
    </body>
</html>