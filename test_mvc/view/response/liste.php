<?php
/** @var Ticket[] $responses **/
?>
<ul>
<?php foreach($responses as $response){ ?>
<li>
    <h2><?php echo $response->getUser()['name'] ?></h2>
    <div><?php echo $response['content'] ?></div>
</li>
<?php } ?>
</ul>
<a href="<?php echo ROOT ?>response/ajouter_modifier">Ajouter un réponse</a>
