<?php
function crop($file, $thumbnailWitdh, $dir){
    $ext = explode('.', $file);
    $name = explode('/', $ext[0]);
    $name = strtolower($name[count($name)-1]);
    $ext = strtolower($ext[count($ext)-1]);
    switch ($ext) {
        case 'gif':
            $source_gd_image = imagecreatefromgif($file);
            break;
        case 'jpeg':
        case 'jpg':
            $source_gd_image = imagecreatefromjpeg($file);
            break;
        case 'png':
            $source_gd_image = imagecreatefrompng($file);
            break;
        default:
            echo 'Erreur de format de l\'image';
            die();
    }
    if($source_gd_image === false){
        echo 'erreur lors de la récupération de la source de l\'image';
        die();
    }
    else{
        var_dump($source_gd_image);
    }
    $imgsize = getimagesize($file);
    if($imgsize === false){
        echo 'erreur lors de la récupération de la source de l\'image';
        die();
    }
    $thumbnailHeight = floor($thumbnailWitdh*$imgsize[1]/$imgsize[0]);
    $thumbnail = imagecreatetruecolor($thumbnailWitdh, $thumbnailHeight);
    imagecopyresampled($thumbnail, $source_gd_image, 0, 0, 0, 0, $thumbnailWitdh,
        $thumbnailHeight, $imgsize[0], $imgsize[1]);
    imagejpeg($thumbnail, $dir.'/thumb_'.$name.'.png', 90);
    echo' <img src="'.$dir.'/thumb_'.$name.'.png">';
}