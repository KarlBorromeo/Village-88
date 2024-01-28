<?php
$my_img = imagecreate( 200, 80 );
imagecolorallocate( $my_img, 255, 255,0 );
$text_colour = imagecolorallocate( $my_img, 255,103,0 );
$text_colour2 = imagecolorallocate( $my_img, 0,0,192 );
$line_colour = imagecolorallocate( $my_img, 39,168,39 );
$line_colour2 = imagecolorallocate( $my_img, 133,133,26 );
imagestring( $my_img, 5, 35, 25, "SiteDesignTips", $text_colour );
imagestring( $my_img, 5, 36, 40, "thesitewizard", $text_colour2 );
imagesetthickness ( $my_img, 3 );
imageline( $my_img, 3, 0, 3, 80, $line_colour2 );
imageline( $my_img, 0, 0, 200, 0, $line_colour );
imageline( $my_img, 199, 0, 199, 80, $line_colour );
imageline( $my_img, 0, 77, 199, 77, $line_colour2 );

header( "Content-type: image/png" );
imagepng( $my_img );
imagecolordeallocate( $line_color );
imagecolordeallocate( $text_color );
// imagecolordeallocate( $background );
imagedestroy( $my_img );
?>