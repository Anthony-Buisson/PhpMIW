<?php
require_once 'GenericPdo.php';
require_once 'userPdo.php';

class articlePdo extends GenericPdo
{
    function create(article $article): bool
    {
        $userPdo = new userPdo();
        $validId = $userPdo->select($article->getIdUser());
        if(!$validId) return false;
        $req = $this->bdd->prepare('INSERT INTO article (titre, contenu, id_user, datetime, image) VALUES (:titre, :contenu, :id_user, NOW(), :image);');
        $req->bindValue('titre', $article->getTitre());
        $req->bindValue('contenu', $article->getContenu());
        $req->bindValue('id_user', $article->getIdUser(), PDO::PARAM_INT);
        $req->bindValue('image', $article->getImage());
        return $req->execute();
    }

    function select($id)
    {
        $req = $this->bdd->prepare('SELECT * FROM article WHERE id=:id;');
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    function selectByUser($id_user)
    {
        $req = $this->bdd->prepare('SELECT * FROM article WHERE id_user=:id_user;');
        $req->bindValue('id_user', $id_user);
        $req->execute();
        return $req->fetchAll();
    }

    function getLast(){
        $req = $this->bdd->query('SELECT * FROM article ORDER BY id desc LIMIT 1');
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
    function selectAll()
    {
        $req = $this->bdd->prepare('SELECT * FROM article;');
        $req->execute();
        return $req->fetchAll();
    }

    function update(article $article): bool
    {
        $req = $this->bdd->prepare('UPDATE article SET titre=:titre, contenu=:contenu, id_user=:id_user, datetime=:datetime, image=:image WHERE id=:id');
        $req->bindValue('titre', $article->getTitre());
        $req->bindValue('contenu', $article->getContenu());
        $req->bindValue('image', $article->getImage());
        $req->bindValue('id_user', $article->getIdUser());
        $req->bindValue('datetime', $article->getDatetime());
        $req->bindValue('id', $article->getId());
        return $req->execute();
    }

    function delete(article $article): bool
    {
        $commentairePdo = new commentairePdo();
        $toDelete = $commentairePdo->selectByArticle($article->getId());
        foreach ($toDelete as $val){
            $commentairePdo->delete($val);
        }
        $req = $this->bdd->prepare('DELETE FROM article WHERE id=:id');
        $req->bindValue('id', $article->getId());
        return $req->execute();
    }
}