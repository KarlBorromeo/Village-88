<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title>Card</title>
        <style>
        .shade{
            background-color: gray;
        }
        </style>
    </head>
    <body>
<?php   $users = array( 
        array('cardholder_name'=> 'Michael Choi', 'cvc' => 123, 'acc_num' => '1234 5678 9876 5432'),
        array('cardholder_name'=> 'John Supsupin','cvc' => 789, 'acc_num' => '0001 1200 1500 1510'),
        array('cardholder_name'=> 'KB Tonel', 'cvc' => 567, 'acc_num' => '4568 456 123 5214'),
        array('cardholder_name'=> 'Mark Guillen', 'cvc' => 345, 'acc_num' => '123 123 123 123'),
        array('cardholder_name'=> '1Michael Choi', 'cvc' => 123, 'acc_num' => '1234 5678 9876 5432'),
        array('cardholder_name'=> '1John Supsupin','cvc' => 789, 'acc_num' => '0001 1200 1500 1510'),
        array('cardholder_name'=> '1KB Tonel', 'cvc' => 567, 'acc_num' => '4568 456 123 5214'),
        array('cardholder_name'=> '1Mark Guillen', 'cvc' => 345, 'acc_num' => '123 123 123 123'));?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Name in uppercase</th>
                    <th>Account Num</th>
                    <th>CVC Num</th>
                    <th>Full account</th>
                    <th>Length of full account</th>
                    <th>Is valid</th>
                <tr>
            </thead>
            <tbody>
<?php       foreach($users as $key => $num){    ?>
                <?= '<tr class='.($key%3==0?"shade":"").'>'."\n" ?>
                    <?= '<td>'. $key .'</td>'."\n" ?>
                    <?= '<td>'. $num['cardholder_name'] .'</td>'."\n" ?>
                    <?= '<td>'. strtoupper($num['cardholder_name']) .'</td>'."\n" ?>
                    <?= '<td>'. $num['acc_num'] .'</td>'."\n" ?>
                    <?= '<td>'. $num['cvc'] .'</td>'."\n" ?>
<?php               $fullAcc = $num['acc_num'] . ' ' . $num['cvc'] ?>
                    <?= '<td>'. $fullAcc .'</td>'."\n" ?>
<?php               $length = strlen(str_replace(' ','',$fullAcc)) ?>
                    <?= '<td>'. $length .'</td>'."\n" ?>
                    <?= '<td>'. ($length==19?'yes':'no') .'</td>'."\n" ?>
                <?= '</tr>'."\n" ?>
<?php } ?>
            </tbody>
        </table>
    </body>
</html>