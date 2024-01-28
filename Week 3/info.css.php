<?php
    header('Content-type: text/css');
    $randFS = rand(15,40);
    $randEM = rand(1,4);
    $color = array('blue','green','black','red','orange','gold');
    $colorIndex = rand(0,5);
?>
p{
    font-size:<?= $randFS.'px' ?>;
    color: <?= $color[$colorIndex] ?>;
}
em{
    font-size:<?= $randEM.'em' ?>;
    color: <?= $color[$colorIndex] ?>;
}