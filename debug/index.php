<?php

require 'config.php';
$bdd = getDB();
//liste des 5 derniers articles
$res = $bdd->query('SELECT * FROM article ORDER BY id desc LIMIT 5');//bug trouve
$articles = $res->fetchAll();


?>
<?php foreach($articles as $article){
    $newDate = date("d-m-Y h:i:s", strtotime($article['datetime'])); ?>
<table>
    <tr>
        <th>Titre</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
        <tr>
            <td><?php echo $article['titre'] ?></td>
            <td><?php echo $newDate ?></td><!--bug trouve-->
            <td>
                <a href="article.php?id_article=<?php echo $article['id'] ?>">Lire</a>
            </td>
        </tr>
<?php } ?>
    </table>