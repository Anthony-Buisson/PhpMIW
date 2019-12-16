<?php


class commentairePdo extends GenericPdo
{
    function create(commentaire $commentaire): bool
    {
        $userPdo = new userPdo();
        $validUser = $userPdo->select($commentaire->getIdUser());
        $articlePdo = new articlePdo();
        $validArticle = $articlePdo->select($commentaire->getIdArticle());
        if((!$validUser) || (!$validArticle)) return false;
        $req = $this->bdd->prepare('INSERT INTO commentaire (titre, contenu, id_user, id_article, datetime) VALUES (:titre, :contenu, :id_user, :id_article, NOW());');
        $req->bindValue('titre', $commentaire->getTitre());
        $req->bindValue('contenu', $commentaire->getContenu());
        $req->bindValue('id_user', $commentaire->getIdUser(), PDO::PARAM_INT);
        $req->bindValue('id_article', $commentaire->getIdArticle(), PDO::PARAM_INT);
        return $req->execute();
    }

    function select($id): commentaire
    {
        $req = $this->bdd->prepare('SELECT * FROM commentaire WHERE id=:id;');
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchObject(commentaire::class);
    }

    function selectByUser($id_user)
    {
        $req = $this->bdd->prepare('SELECT * FROM commentaire WHERE id_user=:id_user;');
        $req->bindValue('id_user', $id_user);
        $req->execute();
        return $req->fetchAll();
    }

    function selectByArticle($id_article)
    {
        $req = $this->bdd->prepare('SELECT * FROM commentaire WHERE id_article=:id_article;');
        $req->bindValue('id_article', $id_article);
        $req->execute();
        return $req->fetchAll();
    }
    function selectAll()
    {
        $req = $this->bdd->prepare('SELECT * FROM commentaire;');
        $req->execute();
        return $req->fetchAll();
    }

    function update(commentaire $commentaire): bool
    {
        $req = $this->bdd->prepare('UPDATE commentaire SET titre=:titre, contenu=:contenu WHERE id=:id');
        $req->bindValue('titre', $commentaire->getTitre());
        $req->bindValue('contenu', $commentaire->getContenu());
        return $req->execute();
    }

    function delete(commentaire $commentaire): bool
    {
        $req = $this->bdd->prepare('DELETE FROM commentaire WHERE id=:id');
        $req->bindValue('id', $commentaire->getId());
        return $req->execute();
    }
}