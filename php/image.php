<?php
    $width=$_POST['width'];
    $height=$_POST['height'];
    $r=$_POST['red'];
    $g=$_POST['green'];
    $b=$_POST['black'];
    $format = $_POST['format'];
    $raw_image = imagecreate($width,$height);
    imagecolorallocate($raw_image,$r,$g,$b);
    $ran = rand(0,500000);
    if($format=="jpeg")
    {
        if(imagejpeg($raw_image,"../images/".$ran.".jpg"))
        {
            echo $ran.".jpg";
        }
        imagedestroy($raw_image);
    }
    elseif($format=="png")
    {
        if(imagepng($raw_image,"../images/".$ran.".jpg"))
        {
            echo $ran.".png";
        }
        imagedestroy($raw_image);
    }
    elseif($format=="jpg")
    {
        if(imagegif($raw_image,"../images/".$ran.".gif"))
        {
            echo $ran.".gif";
        }
        imagedestroy($raw_image);
    }
    ?>