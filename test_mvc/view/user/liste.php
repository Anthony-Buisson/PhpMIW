<?php
/** @var User[] $users **/
?>
<b style="border: 1px solid black;">Users <a href="<?php echo ROOT ?>ticket/liste">Tickets</a></b>

<ul>
    <?php foreach($users as $user){ ?>
        <li><a href="<?php echo ROOT ?>user/detail?id=<?php echo $user['id']?>"><?php echo $user['name'] ?></a></li>
    <?php } ?>
</ul>
<a href="<?php echo ROOT ?>user/ajouter_modifier">Ajouter un user</a>
