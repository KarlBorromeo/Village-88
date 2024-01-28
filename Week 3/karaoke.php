<?php
    $score = rand(1,100);
    $message = '';
    switch($score){
        case $score<50:
            $message = "Never sing again, ever!";
            break;
        case $score>=50 AND $score<80:
            $message = "Practice more!";
            break;
        case $score>=80 AND $score<94:
            $message = "You're getting better!";
            break;
        case $score>=95 AND $score<=100:
            $message = "What an excellent singer!";
            break;
    }
    echo "<h1>$score</h1><br><h2>$message</h2>";
?>