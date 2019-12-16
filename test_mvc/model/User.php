<?php

class User extends Model {
    public $id;
    public $name;

    public function __construct($id=null){
        parent::__construct();
        if(!is_null($id)){
            $req = $this->bdd->prepare('SELECT * FROM user WHERE id=:id');
            $req->bindValue(':id', $id);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            $this->id = $data['id'];
            $this->name = $data['name'];
        }
    }

    public function save(){
        $this->id != null ? $this->update() : $this->create();
    }

    public function getAll(){
        $req = $this->bdd->prepare('SELECT * FROM `user`;');
        $req->execute();
        return $req->fetchAll();
    }

    public function getTickets(){
        $req = $this->bdd->prepare('SELECT * FROM `ticket` WHERE id_user=:id;');
        $req->bindValue(':id', $this->id);
        $req->execute();
        return $req->fetchAll();
    }

    public function create(){
        $req = $this->bdd->prepare('INSERT INTO `user` (name) VALUE (:name)');
        $req->bindValue(':name', $this->name);
        $req->execute();
        $this->id = $this->bdd->lastInsertId();
    }

    public function update(){
        $req = $this->bdd->prepare('UPDATE `user` SET `name`=:name WHERE `id`=:id');
        $req->bindValue(':name', $this->name);
        $req->bindValue(':id', $this->id);
        $req->execute();
    }

    public function delete(){
        $req = $this->bdd->prepare('DELETE FROM `user` WHERE `id`=:id; DELETE FROM `ticket` WHERE `id_user`=:id');
        $req->bindValue(':id', $this->id);
        $req->execute();
    }
}