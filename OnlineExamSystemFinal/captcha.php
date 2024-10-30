<?php
	
	
	session_start(); 

	// Generate a random number 
	// from 10000-99999 
	$captcha = rand(10000,99999); 

	// The capcha will be stored 
	// for the session 
	$_SESSION["captcha"] = $captcha;  

	// Generate a 335x40 standard captcha image
	$height = 40; 
	$width = 80;   
	$image_p = imagecreate($width, $height); 

	// Black color 
	$black = imagecolorallocate($image_p, 0, 150, 0);

	// White color 
	$white = imagecolorallocate($image_p, 255, 255, 255);

	// Print the captcha text in the image 
	// with random position & size  
	$font_size = 12; 
	imagestring($image_p, $font_size, 20, 12, $captcha, $white); 

	imagejpeg($image_p, null, 100); 

	// VERY IMPORTANT: Prevent any Browser Cache!! 
	header("Cache-Control: no-store, no-cache, must-revalidate"); 

	// The PHP-file will be rendered as image 
	header('Content-type: image/png'); 

	
	
	?>