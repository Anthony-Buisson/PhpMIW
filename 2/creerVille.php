<?php
try{
    $bdd = new PDO(
        'mysql:host=localhost;dbname=test;charset=utf8',
        'root',
        '',
        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING)
    );
}catch (Exception $e){
    die('Erreur : '.$e->getMessage());
}
$req = $bdd->prepare('INSERT INTO city (name, countrycode,district, population) VALUES (:name, :countrycode, :district, :population)');
$name = $_POST['name'];
$countryCode = $_POST['countrycode'];
$district = $_POST['district'];
$population = $_POST['population'];
$req->bindValue('name', $name, PDO::PARAM_STR);
$req->bindValue('countrycode', $countryCode, PDO::PARAM_STR);
$req->bindValue('district', $district, PDO::PARAM_STR);
$req->bindValue('population', $population, PDO::PARAM_INT);
$req->execute();
?>
<h1> <?php echo $req ? 'Ville ajoutée' : 'Erreur' ?></h1>
