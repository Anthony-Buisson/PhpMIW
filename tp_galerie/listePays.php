<?php
require_once 'pdo/countryPdo.php';
require_once 'classes/country.php';
require_once 'functions.php';
try{
    $bdd = new countryPdo();
}catch (Exception $e){
    die('Erreur : '.$e->getMessage());
}
$code = $_GET['code'];
$pays = $bdd->select($code);
if(!$pays) header('Location: index');
if(isset($_FILES['fichier'])){

    try{
        $filepath = uploadFile('fichier');
    }catch (Exception $e){
        echo $e->getMessage();
        die;
    }

    if(file_exists($filepath)){
        echo 'Upload fichier OK<br />';
        resizeImg($filepath, 150,150);
    }
}
?>
<h1><a href="index.php">Accueil</a></h1>
<div style="width: 50%; display: inline-block">
    <table style="border:1px solid black;border-collapse: collapse;">
        <?php
        foreach ($pays as $key=>$val){
            echo '
        <tr style="border:1px solid black;border-collapse: collapse;">
        <td style="border:1px solid black;border-collapse: collapse;"><b>'.$key.'</b></td>
        <td style="border:1px solid black;border-collapse: collapse;">'.$val.'</td>
    </tr>';
        }?>
    </table>
    <table>
        <th>
            <td>Image</td>
            <td>Nom</td>
            <td>Description</td>
            <td>Image originale</td>
        </th>
        <?php
        $images = getImages($code);
        foreach ($images as $image){
            if(file_exists('upload/src/'.$image['id'].'.png')) $ext = 'png';
            else if(file_exists('upload/src/'.$image['id'].'.gif')) $ext = 'gif';
            else if(file_exists('upload/src/'.$image['id'].'.jpg')) $ext = 'jpg';
            else if(file_exists('upload/src/'.$image['id'].'.jpeg')) $ext = 'jpeg';
                echo '
        <tr style="border:1px solid black;border-collapse: collapse;">
        <td style="border:1px solid black;border-collapse: collapse;"><img src="upload/thumb/'.$image['id'].'_thumb_150x150.jpg" alt="Image introuvable"></td>
        <td style="border:1px solid black;border-collapse: collapse;">'.$image['name'].'</td>
        <td style="border:1px solid black;border-collapse: collapse;">'.$image['description'].'</td>
        <td style="border:1px solid black;border-collapse: collapse;"><a href="upload/src/'.$image['id'].'.'.$ext.'">Orignale</a></td>
    </tr>';
        }?>
    </table>
</div>
<hr>
<form enctype="multipart/form-data" method="post">
    <input style="visibility: hidden;" name="countrycode" value="<?php echo $code?>">
    <label>Nom : </label><input type="text" name="name"><br>
    <label for="desc">Description : </label><textarea name="description"></textarea><br>
    <label>Image : </label><input type="file" name="fichier"><br>
    <input type="submit">
</form>