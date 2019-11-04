<?php
require_once 'pdo/countryPdo.php';
require_once 'classes/country.php';
try{
    $bdd = new countryPdo();
}catch (Exception $e){
    die('Erreur : '.$e->getMessage());
}
$pays = $bdd->selectMinimalInfos();
?>
<table>
    <tr>
        <td>Pays</td>
        <td>Population</td>
    </tr>
    <?php
    foreach ($pays as $row){
        echo '
        <tr>
        <td><a href="listePays.php?code='.$row['code'].'">'.$row['name'].'</a></td>
        <td>'.$row['population'].'</td>
    </tr>';
    }
    ?>
</table>
</body>
</html>
