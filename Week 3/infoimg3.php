<?php
$my_img = imagecreate( 200, 80 );
imagecolorallocate( $my_img, 141,141,193 );
$text_colour = imagecolorallocate( $my_img, 207,207,92 );
$text_colour2 = imagecolorallocate( $my_img, 0,0,192 );
$line_colour = imagecolorallocate( $my_img, 159,159,183 );
$line_colour2 = imagecolorallocate( $my_img, 43,43,81 );
imagestring( $my_img, 5, 50, 25, "HowTohaven", $text_colour );
imagestring( $my_img, 5, 105, 40, ".com", $text_colour );
imagesetthickness ( $my_img, 3 );
imageline( $my_img, 2, 0, 2, 80, $line_colour );
imageline( $my_img, 0, 2, 200, 2, $line_colour );
imageline( $my_img, 198, 0, 198, 80, $line_colour2 );
imageline( $my_img, 0, 78, 199, 78, $line_colour2 );

header( "Content-type: image/png" );
imagepng( $my_img );
imagecolordeallocate( $line_color );
imagecolordeallocate( $text_color );
// imagecolordeallocate( $background );
imagedestroy( $my_img );
?>