<?php

	$width = $_POST['new-width'];
	$height=$_POST['new-height'];
	$file=$_FILES['file-input'];
	
	$uploaded_image=$file['tmp_name'];
	$type=$file['type'];
	$ran=rand(1,25689);
	if($type=="image/jpeg")
	{
		$image_pixels=imagecreatefromjpeg($uploaded_image);
		$o_width=imagesx($image_pixels);
		$o_height=imagesy($image_pixels);
		$canvas= imagecreatetruecolor($width,$height);
		imagecopyresampled($canvas, $image_pixels,0,0,0,0,$width,$height,$o_width,$o_height);
		if(imagejpeg($canvas,'../images/'.$ran.'.jpeg'))
		{
			echo $ran.".jpeg";
		}
		imagedestroy($image_pixels);
	}
	elseif($type=="image/png")
	{
		$image_pixels=imagecreatefrompng($uploaded_image);
		$o_width=imagesx($image_pixels);
		$o_height=imagesy($image_pixels);
		$canvas= imagecreatetruecolor($width,$height);
		imagecopyresampled($canvas, $image_pixels,0,0,0,0,$width,$height,$o_width,$o_height);
		if(imagepng($canvas,'../images/'.$ran.'.png'))
		{
			echo $ran.".png";
		}
		imagedestroy($image_pixels);
	}
	elseif($type=="image/gif")
	{
		$image_pixels=imagecreatefromgif($uploaded_image);
		$o_width=imagesx($image_pixels);
		$o_height=imagesy($image_pixels);
		$canvas= imagecreatetruecolor($width,$height);
		imagecopyresampled($canvas, $image_pixels,0,0,0,0,$width,$height,$o_width,$o_height);
		if(imagegif($canvas,'../images/'.$ran.'.gif'))
		{
			echo $ran.".gif";
		}
		imagedestroy($image_pixels);
	}
	elseif($type=="image/bmp")
	{
		$image_pixels=imagecreatefrombmp($uploaded_image);
		$o_width=imagesx($image_pixels);
		$o_height=imagesy($image_pixels);
		$canvas= imagecreatetruecolor($width,$height);
		imagecopyresampled($canvas, $image_pixels,0,0,0,0,$width,$height,$o_width,$o_height);
		if(imagebmp($canvas,'../images/'.$ran.'.bmp'))
		{
			echo $ran.".bmp";
		}
		imagedestroy($image_pixels);
	}
	elseif($type=="image/webp")
	{
		$image_pixels=imagecreatefromwebp($uploaded_image);
		$o_width=imagesx($image_pixels);
		$o_height=imagesy($image_pixels);
		$canvas= imagecreatetruecolor($width,$height);
		imagecopyresampled($canvas, $image_pixels,0,0,0,0,$width,$height,$o_width,$o_height);
		if(imagewebp($canvas,'../images/'.$ran.'.webp'))
		{
			echo $ran.".webp";
		}
		imagedestroy($image_pixels);
	}
?>