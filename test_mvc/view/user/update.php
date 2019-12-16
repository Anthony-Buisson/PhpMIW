<?php
/** @var User $user **/
?>
<form action="<?php echo ROOT?>user/post" method="post">
    <label for="title">Nom : </label>
    <input id="title" name="name" type="text" placeholder="Dujardin" value="<?php echo isset($user->name) ? $user->name : '';?>">
    <br>
    <input id="id" name="id" type="number" value="<?php echo isset($user->id) ? $user->id : '';?>" style="display: none;">
    <input type="submit">
</form>