<?php

	$file = $_GET['file'];
	
	$location = 'upload/'.$file;
	$newFile = time().'_'.$file;
	$newloc = 'upload/'.$newFile;
	
	$targ_w = $targ_h = 250;
	
	$img_r = imagecreatefromjpeg($location);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);

	imagejpeg($dst_r, 'upload/'.$newFile);
	
	//connection
	$conn = new mysqli('localhost', 'root', '', 'crop');

	$sql="insert into images (location, date_added) values ('$newloc', NOW())";
	$conn->query($sql);

	header('location:view.php');

?>