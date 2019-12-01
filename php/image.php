<?php
    $width=$_POST['width'];
    $height=$_POST['height'];
    $format=$_POST['format'];
    $red=$_POST['red'];
    $green=$_POST['green'];
    $black=$_POST['black'];

    $raw_image=imagecreate($width,$height);
    imagecolorallocate($raw_image, $red,$green,$black);
    $ran=rand(1,2000);
    if($format==='jpeg')
    {
        if(imagejpeg($raw_image,"../images/".$ran.".jpg"))
        {
            echo $ran.".jpg";
        }
        imagedestroy($raw_image);
    }
    else if($format==='png')
    {
        if(imagepng($raw_image,"../images/".$ran.".png"))
        {
            echo $ran.".png";
        }
        imagedestroy($raw_image);
    }
    else if($format==='gif')
    {
        if(imagegif($raw_image,"../images/".$ran.".gif"))
        {
            echo $ran.".gif";
        }
        imagedestroy($raw_image);
    }
?>