
<?php
/** @var User[] $users **/
/** @var Response $response **/
if(!isset($response->id_ticket)) return;
$backlink = ROOT.'ticket/detail?id='.$response->id_ticket;
?>
<a href="<?php echo $backlink?>">< Retour</a>
<form action="<?php echo ROOT?>response/post" method="post">
    <label for="content">Contenu : </label>
    <textarea name="content" id="content" cols="30" rows="10"></textarea>
    <br>
    <label for="id_user">User : </label>
    <select name="id_user" id="id_user">
        <?php foreach($users as $user){ ?>
            <option <?php if(isset($response->id_user) && $user['id'] == $response->id_user) echo 'selected';?> value="<?php echo $user['id']?>"><?php echo $user['name']?></option>
        <?php } ?>
    </select>
    <br>
    <input id="id_ticket" name="id_ticket" type="number" value="<?php echo $response->id_ticket;?>" style="display: none;">
    <input type="submit">
</form>