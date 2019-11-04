<?php
require_once 'pdo/galleryPdo.php';
require_once 'classes/gallery.php';
/**
 * @param $filename string The name in the html input file
 * @return bool|string false if uploaderror, file path ad name if succeeded
 * @throws Exception
 */
function uploadFile($filename){
    if($_FILES[$filename]['error'] == UPLOAD_ERR_OK){
        $imgExt = ['jpg', 'jpeg', 'gif', 'png'];
        $destDir = 'upload/src/';
        if(!is_dir($destDir))
            mkdir($destDir);

        //on récupère les données du document
        $pathInfo = pathinfo($_FILES[$filename]['name']);
        $pathInfo['extension'] = strtolower($pathInfo['extension']);
        if(!in_array($pathInfo['extension'], $imgExt)){
            throw new Exception('Fichier jpg, png ou gif uniquement');
        }

        if(empty($error)){
            if(!is_dir($destDir))
                mkdir($destDir);
            $galleryPdo = new galleryPdo();
            $uniqueFileName = $galleryPdo->getLastId().'.'.$pathInfo['extension'];
            if(!move_uploaded_file($_FILES[$filename]['tmp_name'], $destDir.$uniqueFileName)){
                throw new Exception('Impossible d\'enregistrer le fichier.');
            }else{
                $gallery = new gallery($_POST['countrycode'],$_POST['name'],$_POST['description']);
                if(!$galleryPdo->create($gallery)) return false;
                return $destDir.$uniqueFileName;
            }
        }
    }else{
        switch ($_FILES[$filename]['error']){
            case UPLOAD_ERR_INI_SIZE:
                throw new Exception('Le fichier reçu dépasse la limite de '.ini_get('upload_max_filesize').'.');
                break;
            case UPLOAD_ERR_PARTIAL:
            case UPLOAD_ERR_NO_TMP_DIR:
            case UPLOAD_ERR_CANT_WRITE:
            case UPLOAD_ERR_EXTENSION:
                throw new Exception('Erreur lors de l\'uplaod, veuillez réessayer.');
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('Erreur lors de l\'uplaod, aucun fichier reçu.');
                break;
        }
    }
    return false;
}

function resizeImg($filepath, $thumbnailWitdh = null, $thumbnailHeight = null){
    if(!file_exists($filepath))
        return false;

    $imgExt = ['jpg', 'jpeg', 'gif', 'png'];
    //on récupère les données du document
    $pathInfo = pathinfo($filepath);
    $pathInfo['extension'] = strtolower($pathInfo['extension']);
    if(!in_array($pathInfo['extension'], $imgExt))
        return false;

    //récupération de la source de l'image d'origine
    switch ($pathInfo['extension']) {
        case 'gif':
            $source_gd_image = imagecreatefromgif($filepath);
            break;
        case 'jpeg':
        case 'jpg':
            $source_gd_image = imagecreatefromjpeg($filepath);
            break;
        case 'png':
            $source_gd_image = imagecreatefrompng($filepath);
            break;
    }
    if($source_gd_image === false)
        return false;

    $imgsize = getimagesize($filepath);
    $diffX = 0;
    $diffY = 0;
    if($imgsize === false)
        return false;

    if(is_null($thumbnailWitdh) && is_null($thumbnailHeight))
        return false;

    if(is_null($thumbnailWitdh)){
        $thumbnailWitdh = floor($thumbnailHeight*$imgsize[0]/$imgsize[1]);
    }else if(is_null($thumbnailHeight)){
        $thumbnailHeight = floor($thumbnailWitdh*$imgsize[1]/$imgsize[0]);
    }else{//hauteur et largeur définies
        if($imgsize[0] > $imgsize[1]){ //largeur > hauteur donc pas de bandes noires en largeur
            $diffY = $thumbnailHeight - floor($thumbnailWitdh*$imgsize[1]/$imgsize[0]);
        }
        else{//bandes noires seulement en hauteur
            $diffX = $thumbnailWitdh - floor($thumbnailHeight*$imgsize[0]/$imgsize[1]);
        }
    }

    //on créé une image "vide" (une image noire)
    $thumbnail = imagecreatetruecolor($thumbnailWitdh, $thumbnailHeight);

    //on créé une copie de notre image source
    //dst_x et dst_y sont les bandes noires à gauche et en haut de l'image retaillée
    //on enlève diffY et diffX pour avoir les bandes noires à droite et en bas
    imagecopyresampled($thumbnail, $source_gd_image, $diffX/2, $diffY/2, 0, 0, $thumbnailWitdh-$diffX, $thumbnailHeight-$diffY, $imgsize[0], $imgsize[1]);
    //et on en fait un fichier jpeg avec une qualité de 90%
    $dossier = 'upload/thumb/';
    if(!is_dir($dossier))
        mkdir($dossier);
    imagejpeg($thumbnail, $dossier.$pathInfo['filename'].'_thumb_'.$thumbnailWitdh.'x'.$thumbnailHeight.'.jpg', 90);
    imagedestroy($source_gd_image);
    imagedestroy($thumbnail);
}

function getImages($countryCode){
    $galleryPdo = new galleryPdo();
    return $galleryPdo->selectByCode($countryCode);
}