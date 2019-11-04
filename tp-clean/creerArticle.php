<?php
require 'config.php';//chemin d'accès
require_once 'functions.php';
$bdd = getDB();

$reqUser = $bdd->query('SELECT * FROM `user`');
$users = $reqUser->fetchAll(PDO::FETCH_ASSOC);
if(isset($_FILES['fichier']) && !isset($_GET['id_article'])){
    try{
        $filepath = uploadFile('fichier');
    }catch (Exception $e){
        echo $e->getMessage();
        die;
    }

    if(file_exists($filepath)){
        echo 'Upload fichier OK<br />';
        resizeImg($filepath, 100,100);
        $articlePdo = new articlePdo();
        $article = new article($_POST['titre'], $_POST['contenu'], $_POST['id_user'], null,str_replace('upload/src/','',$filepath));
        $articlePdo->create($article);
        $id = $articlePdo->getLast()['id'];
        header('Location: article.php?id_article='.$id);
    }
}
else if (!isset($_GET['id_article'])) { ?>
    <a href="index.php">< Retour</a>
    <form enctype="multipart/form-data" method="post">
        <label for="user">Utilisateur :</label>
        <select id="user" name="id_user">
            <?php foreach ($users as $user) { ?>
                <option value="<?php echo $user['id'] ?>"><?php echo $user['name'] ?></option>
            <?php } ?>
        </select>
        <label for="titre">Titre</label><input type="text" id="titre" name="titre">
        <div>
            <label for="contenu">Contenu</label><textarea id="contenu" name="contenu"></textarea>
        </div>
        <label>Image : </label><input type="file" name="fichier"><br>
        <input type="submit">
    </form>
<?php }else{
    $articlePdo = new articlePdo();
    $article = $articlePdo->select($_GET['id_article']);
?>
<form enctype="multipart/form-data" method="post">
    <a href="index.php">< Retour</a>
    <form enctype="multipart/form-data" method="post">
        <label for="titre">Titre</label><input type="text" id="titre" value="<?php echo $article['titre'] ?>" name="titre">
        <div>
            <label for="contenu">Contenu</label><textarea id="contenu" name="contenu"><?php echo $article['contenu'] ?></textarea>
        </div>
        <label>Image : </label><input type="file" name="fichier"><br>
        <input type="submit">
    </form>
<?php } ?>