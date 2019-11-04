<?php
require_once 'GenericPdo.php';
require_once 'countryPdo.php';

class galleryPdo extends GenericPdo
{
    function create(gallery $image): bool
    {
        $countryPdo = new countryPdo();
        $validCode = $countryPdo->select($image->getCountrycode());
        if(!$validCode) return false;
        $req = $this->bdd->prepare('INSERT INTO gallery (countrycode, name, description) VALUES (:countrycode, :name, :description);');
        $req->bindValue('countrycode', $image->getCountrycode());
        $req->bindValue('name', $image->getName());
        $req->bindValue('description', $image->getDescription());
        return $req->execute();
    }

    function select($id): gallery
    {
        $req = $this->bdd->prepare('SELECT * FROM gallery WHERE id=:id;');
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchObject(gallery::class);
    }

    function selectByCode($countrycode)
    {
        $req = $this->bdd->prepare('SELECT * FROM gallery WHERE countrycode=:countrycode;');
        $req->bindValue('countrycode', $countrycode);
        $req->execute();
        return $req->fetchAll();
    }
    function selectAll()
    {
        $req = $this->bdd->prepare('SELECT * FROM gallery;');
        $req->execute();
        return $req->fetchAll();
    }

    function getLastId(){
        $req = $this->bdd->prepare('SELECT AUTO_INCREMENT FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = \'phpmiw\' AND TABLE_NAME = \'gallery\';');
        $req->execute();
        return $req->fetch()[0];
    }

    function update(gallery $pays): bool
    {
        $req = $this->bdd->prepare('UPDATE gallery SET countrycode=:countrycode, name=:name, description=:description WHERE id=:id');
        $req->bindValue('countrycode', $pays->getCountrycode());
        $req->bindValue('name', $pays->getName());
        $req->bindValue('description', $pays->getDescription());
        return $req->execute();
    }

    function delete(gallery $image): bool
    {
        $req = $this->bdd->prepare('DELETE FROM gallery WHERE id=:id');
        $req->bindValue('id', $image->getId());
        return $req->execute();
    }

}