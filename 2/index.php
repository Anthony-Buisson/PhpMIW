<html>
<body>
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
$pays = $bdd->query('SELECT code, name, population FROM country ORDER BY population DESC;');
?>
<table>
    <tr>
        <td>Pays</td>
        <td>Population</td>
    </tr>
    <?php
    while ($row = $pays->fetch()){
        echo '
        <tr>
        <td><a href="pays?code='.$row['code'].'">'.$row['name'].'</a></td>
        <td>'.$row['population'].'</td>
    </tr>';
    }?>
</table>
</body>
</html>
