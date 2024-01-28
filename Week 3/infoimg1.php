<?php
$my_img = imagecreate( 200, 80 );
imagecolorallocate( $my_img, 0, 255,0 );
$text_colour = imagecolorallocate( $my_img, 254,1,0 );
$text_colour2 = imagecolorallocate( $my_img, 0,102,153 );
$line_colour = imagecolorallocate( $my_img, 39,168,39 );
imagestring( $my_img, 5, 50, 25, "Free Stuff@", $text_colour );
imagestring( $my_img, 3, 50, 40, "thefreecountry", $text_colour2 );
imagesetthickness ( $my_img, 3 );
imageline( $my_img, 0, 0, 0, 80, $line_colour );
imageline( $my_img, 0, 0, 200, 0, $line_colour );
imageline( $my_img, 199, 0, 199, 80, $line_colour );
imageline( $my_img, 0, 79, 199, 79, $line_colour );

header( "Content-type: image/png" );
imagepng( $my_img );
imagecolordeallocate( $line_color );
imagecolordeallocate( $text_color );
// imagecolordeallocate( $background );
imagedestroy( $my_img );
?>