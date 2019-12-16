<?php
/** @var User $user **/
?>

<a href="<?php echo ROOT ?>user/liste">< Retour</a>
<h1>Informations sur l'user n°<?php echo $user->id ?></h1>
Nom : <b><?php echo $user->name ?></b><br>

***********
<br>
<a href="<?php echo ROOT ?>user/ajouter_modifier?id=<?php echo $user->id?>">Modifier</a><br>
<a href="<?php echo ROOT ?>user/tickets?id=<?php echo $user->id?>">Listes de ses tickets</a><br>
<a href="<?php echo ROOT ?>user/supprimer?id=<?php echo $user->id?>">Supprimer</a>