<?php
require_once 'GenericPdo.php';

class userPdo extends GenericPdo
{
    function create(user $user): bool
    {
        $req = $this->bdd->prepare('INSERT INTO user (name, email)
                                                VALUES (:name, :email);');
        $req->bindValue('name', $user->getName(), PDO::PARAM_STR);
        $req->bindValue('email', $user->getEmail(), PDO::PARAM_STR);

        return $req->execute();
    }

    function select($id)
    {
        $req = $this->bdd->prepare('SELECT * FROM user WHERE id=:id;');
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    function selectAll()
    {
        $req = $this->bdd->prepare('SELECT * FROM user;');
        return $req->execute();
    }

    function update(user $user): bool
    {
        $req = $this->bdd->prepare('UPDATE user SET name=:name, email=:email WHERE id=:id');
        $req->bindValue('capital', $user->getName(), PDO::PARAM_STR);
        $req->bindValue('code2', $user->getEmail(), PDO::PARAM_STR);
        return $req->execute();
    }

    function delete(user $user): bool
    {
        $articlePdo = new articlePdo();
        $toDelete = $articlePdo->selectByUser($user->getId());
        foreach ($toDelete as $val){
            $articlePdo->delete($val);
        }
        $req = $this->bdd->prepare('DELETE FROM user WHERE id=:id');
        $req->bindValue('id', $user->getId(), PDO::PARAM_INT);
        return $req->execute();
    }
}