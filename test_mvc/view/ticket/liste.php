<?php
/** @var Ticket[] $tickets **/
?>
<b style="border: 1px solid black;">Tickets <a href="<?php echo ROOT ?>user/liste">Users</a></b>

<ul>
<?php foreach($tickets as $ticket){ ?>
    <li><a href="<?php echo ROOT ?>ticket/detail?id=<?php echo $ticket['id']?>"><?php echo $ticket['title'] ?></a></li>
<?php } ?>
</ul>
<a href="<?php echo ROOT ?>ticket/ajouter_modifier">Ajouter un ticket</a>
