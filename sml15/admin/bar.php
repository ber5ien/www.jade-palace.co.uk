<?
header ("Content-type: image/png");

$percent = $_GET['p'] - 1;
$image_height = 6;
$image_width = 100;

// Instantiate an image reference
$im = @imagecreatetruecolor ($image_width, $image_height) or die ("Cannot Initialize new GD image stream");

// Set colors to be used
$barcolor = imagecolorallocate ($im, 51, 204, 51);
$grey = imagecolorallocate ($im, 0xEE, 0xEE, 0xEE);
$dkgrey = imagecolorallocate ($im, 0xB0, 0xB0, 0xB0);
$white = imagecolorallocate ($im, 255, 255, 255);
$black = imagecolorallocate ($im, 0, 0, 0);

// Flood background color with grey
imagefill($im, 0, 0, $grey);
imagerectangle($im, 0, 0, 99, 5, $dkgrey);

// Draw green progress bar
imagefilledrectangle($im, 0, 0, $percent, 5, $barcolor);
imagerectangle($im, 0, 0, $percent, 5, $black);

imagepng ($im);
imagedestroy ($im);

?>