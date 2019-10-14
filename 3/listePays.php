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
$code = $_GET['code'];
$pays = $bdd->prepare('SELECT * FROM country where code = ?;');
$pays->execute(array($code));
$city = $bdd->prepare('SELECT name, population FROM city where countrycode = ? ORDER BY name;');
$city->execute(array($code));
$paysInfos = $pays->fetch(PDO::FETCH_ASSOC);
if(!$paysInfos) header('Location: index');
?>
<h1><a href="index">Accueil</a></h1>
<div style="width: 50%; display: inline-block">
    <table style="border:1px solid black;border-collapse: collapse;">
        <?php
        foreach ($paysInfos as $key=>$val){
            echo '
        <tr style="border:1px solid black;border-collapse: collapse;">
        <td style="border:1px solid black;border-collapse: collapse;"><b>'.$key.'</b></td>
        <td style="border:1px solid black;border-collapse: collapse;">'.$val.'</td>
    </tr>';
        }?>
    </table>
</div><div style="width: 50%; display: inline-block">
    <form action="creerVille" method="post">
        <label>Nom</label><input name="name" type="text"><br>
        <label>Code pays</label><input name="countrycode" type="text" value="<?php echo $code ?>" disabled><br>
        <label>District</label><input name="district" type="text"><br>
        <label>Population</label><input name="population" type="number" min="0"><br>
        <input type="submit" value="Valider">
    </form>
</div>
<hr>
<table>
    <tr>
        <td><b>Ville</b></td>
        <td><b>Population</b></td>
    </tr>
    <?php
    while ($row = $city->fetch()){
        echo '
        <tr>
        <td>'.$row['name'].'</td>
        <td>'.$row['population'].'</td>
    </tr>';
    }?>
</table>
