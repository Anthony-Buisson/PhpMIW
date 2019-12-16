<?php
/** @var User $user **/
/** @var Ticket[] $tickets **/
?>
<h2>Tickets de l'user <?php echo $user->name?></h2>
<a href="<?php echo ROOT ?>user/detail?id=<?php echo $user->id?>">< Retour</a>
<ul>
    <?php if(count($tickets) < 1) echo 'Aucun ticket'?>
    <?php foreach($tickets as $ticket){ ?>
        <li><a href="<?php echo ROOT ?>ticket/detail?id=<?php echo $ticket['id']?>"><?php echo $ticket['title'] ?></a></li>
    <?php } ?>
</ul>
<a href="<?php echo ROOT ?>ticket/ajouter_modifier">Ajouter un ticket</a>
