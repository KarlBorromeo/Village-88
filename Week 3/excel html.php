<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title>Excel to HTML</title>
    </head>
    <style>
        td{
            text-align: center;
        }
        .shaded{
            background-color: gray;
        }
    </style>
    <body>
        <table>
<?php
        ini_set('auto_detect_line_endings', true);
        $file = "us-500.csv";
        if (($handle = fopen($file, "r")) !== FALSE) {
?>
        <?= "\t".'<tbody>' ?>
<?php         
            for($i=0; ($data = fgetcsv($handle)) !== FALSE; $i++){
                if($i%10==0 AND $i <> 0){
                    $class = 'shaded';
                }else{
                    $class = '';
                }
?>                  
                <?= '<tr>' ?>
<?php
                    foreach($data as $data){
?>
                        <?= "\n"."\t"."\t"."\t"."\t"."\t".'<td class="'.$class.'">'.$data.'</td>' ?>
<?php
                    }
?>              <?= "\n"."\t"."\t"."\t"."\t".'</tr>' ?>
<?php   
            }
        }
?>
        <?= "\t".'</tbody>' ?>
        </table>
    </body>
</html>