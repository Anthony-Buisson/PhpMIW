
<?php
/** @var User[] $users **/
/** @var Ticket $ticket **/
$backlink = isset($ticket->id) ? ROOT.'ticket/detail?id='.$ticket->id : ROOT.'ticket/liste';
?>
<a href="<?php echo $backlink?>">< Retour</a>
<form enctype="multipart/form-data" action="<?php echo ROOT?>ticket/post" method="post">
    <label for="title">Titre : </label>
    <input id="title" name="title" type="text" placeholder="L'emailing parfait" value="<?php echo isset($ticket->title) ? $ticket->title : '';?>">
    <br>
    <label for="content">Contenu : </label>
    <textarea name="content" id="content" cols="30" rows="10"><?php echo isset($ticket->content) ? nl2br($ticket->content) : '';?></textarea>
    <br>
    <label for="id_user">User : </label>
    <select name="id_user" id="id_user">
        <?php foreach($users as $user){ ?>
            <option <?php if(isset($ticket->id_user) && $user['id'] == $ticket->id_user) echo 'selected';?> value="<?php echo $user['id']?>"><?php echo $user['name']?></option>
        <?php } ?>
    </select>
    <br>
    <label for="attached_file">Image : </label>
    <input id="attached_file" name="attached_file" type="file" placeholder="9.99" value="<?php echo isset($ticket->file) ? $ticket->file : '';?>">
    <br>
    <label for="priority">Priorité : </label>
    <select name="priority" id="priority">
        <?php foreach(['low', 'critical', 'important'] as $prio){ ?>
            <option <?php if(isset($ticket->priority) && $prio == $ticket->priority) echo 'selected';?> value="<?php echo $prio?>"><?php echo $prio?></option>
        <?php } ?>
    </select>
    <br>
    <input id="id" name="id" type="number" value="<?php echo isset($ticket->id) ? $ticket->id : '';?>" style="display: none;">
    <input type="submit">
</form>