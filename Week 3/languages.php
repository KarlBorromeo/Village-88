<?php
    $success = 0;
    $fail = 0;
    for($i=1; $i<=1000; $i++){
        $message='';
        $trajectory = rand(0,90);
        if($trajectory<=60 AND $trajectory >= 40){  //if the shooting angle is between 40 and 60 it will hit the ring;
            $success++;
            $message = "Success!";
        }else{
            $fail++;
            $message = "Epic Fail!";
        }
        echo "Attempt #$i: Shooting the ball... $message ... Got {$success}x success and {$fail}x epic fail(s) so far";
    }
?>