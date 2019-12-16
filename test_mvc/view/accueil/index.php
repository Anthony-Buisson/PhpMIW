<?php
/**
 * @var Ticket[] $tickets
 */
?>
<h1>Gestion des tickets</h1>
<ul>
    <?php foreach($tickets as $ticket){ ?>
        <li><a href="<?php echo ROOT ?>ticket/detail?id=<?php echo $ticket['id']?>"><?php echo $ticket['title'] ?></a></li>
    <?php } ?>
</ul>
<a href="<?php echo ROOT ?>ticket/ajouter_modifier"><h3>Ajouter un ticket</h3></a>
<a href="<?php echo ROOT ?>user/liste"><h3>Gestion utilisateur</h3></a>