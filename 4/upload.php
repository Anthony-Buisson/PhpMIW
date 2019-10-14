<?php
//types acceptés : pdf, png, jpg, gif
if(isset($_FILES['photo'])){
    var_dump($_FILES['photo']);
    if(($_FILES['photo']['error'] == UPLOAD_ERR_OK) && in_array($_FILES['photo']['type'], ['image/png', 'image/jpg', 'image/jpeg', 'application/pdf', 'image/gif'])){
        $dossier = $_FILES['photo']['type'] == 'application/pdf' ? 'upload/pdf/' : 'upload/image/';
        $matches = null;
        $extension = preg_match_all('((pdf)|(png)|(jpg)|(jpeg)|(gif))',$_FILES['photo']['name'], $matches);
        $fichier = time().'-'.$_POST['nom'].'.'.$matches[0][count($matches[0])-1];//ou on peut mettre le nom de fichier que l'on veut pour être certain d'éviter les doublons
        if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier.$fichier)){
            //la fonction renvoie true, le fichier a bien été enregistré
        }else{
            echo 'echec de l\'upload.';
        }
    }elseif ($_FILES['photo']['error'] > 0){
        switch ($_FILES['photo']['error']){
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo 'Erreur : dépassement de la taille maximale du fichier';
                break;
            case UPLOAD_ERR_PARTIAL:
                echo 'Erreur : le téléchargement du fichier n\'a pas abouti';
                break;
            case UPLOAD_ERR_NO_FILE:
                echo 'Erreur : aucun fichier téléchargé';
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
            case UPLOAD_ERR_CANT_WRITE:
            case UPLOAD_ERR_EXTENSION:
                echo 'Erreur serveur';
                break;
        }
    }elseif (!in_array($_FILES['photo']['type'], ['image/png', 'image/jpg', 'image/jpeg', 'application/pdf', 'image/gif'])){
        echo 'Erreur : mauvais format de fichier';
    }
}