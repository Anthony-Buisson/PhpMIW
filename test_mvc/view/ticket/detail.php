<?php
/** @var Ticket $ticket **/
/** @var Response[] $responses **/
?>

<a href="<?php echo ROOT ?>ticket/liste">< Retour</a>
<h1>Détails du ticket n°<?php echo $ticket->id ?></h1>
Titre : <b><?php echo $ticket->title ?></b><br>
priorité : <b><?php echo $ticket->priority ?></b><br>
contenu : <b><?php echo $ticket->content ?></b><br>
utilisateur : <b><?php echo $ticket->getUser()['name']?></b><br>
image : <img style="width: 300px" src="<?php echo ROOT?>upload/<?php echo $ticket->attached_file?>" alt="image du probleme">
<br>

***********
<h2>Réponses : </h2>
<ul>
    <?php
    foreach($responses as $response){ ?>
        <li>
            <h3>de <?php echo $response->getUser()['name'] ?> : </h3>
            <div><?php echo nl2br($response->content) ?></div>
        </li>
    <?php } ?>
</ul>
<a href="<?php echo ROOT ?>response/ajouter_modifier?id_ticket=<?php echo $ticket->id?>">Ajouter un réponse</a>

*********

<br>
<a href="<?php echo ROOT ?>ticket/ajouter_modifier?id=<?php echo $ticket->id?>">Modifier</a><br>
<a href="<?php echo ROOT ?>ticket/supprimer?id=<?php echo $ticket->id?>">Supprimer</a>