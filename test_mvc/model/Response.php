<?php

class Response extends Model {
    public $id;
    public $id_ticket;
    public $content;
    public $id_user;

    public function __construct($id=null){
        parent::__construct();
        if(!is_null($id)){
            $req = $this->bdd->prepare('SELECT * FROM response WHERE id=:id');
            $req->bindValue(':id', $id);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            $this->id = $data['id'];
            $this->id_ticket = $data['id_ticket'];
            $this->content = $data['content'];
            $this->id_user = $data['id_user'];
        }
    }

    public function save(){
        $this->id != null ? $this->update() : $this->create();
    }

    public function getAll(){
        $req = $this->bdd->prepare('SELECT * FROM response;');
        $req->execute();
        return $req->fetchAll();
    }

    public function getUser(){
        $req = $this->bdd->prepare('SELECT * FROM `user` WHERE id=:id_user;');
        $req->bindValue(':id_user', $this->id_user);
        $req->execute();
        return $req->fetch();
    }

    public function getTicket(){
        $req = $this->bdd->prepare('SELECT * FROM `ticket` WHERE id=:id_ticket;');
        $req->bindValue(':id_ticket', $this->id_ticket);
        $req->execute();
        return $req->fetch();
    }

    public function create(){
        $req = $this->bdd->prepare('INSERT INTO response (id_ticket, content, id_user) VALUE (:id_ticket, :content, :id_user)');
        $req->bindValue(':id_ticket', $this->id_ticket);
        $req->bindValue(':content', $this->content);
        $req->bindValue(':id_user', $this->id_user);
        $req->execute();
        $this->id = $this->bdd->lastInsertId();
    }

    public function update(){
        $req = $this->bdd->prepare('UPDATE `response` SET `id_ticket`=:id_ticket,`content`=:content, `id_user`=:id_user WHERE `id`=:id');
        $req->bindValue(':id_ticket', $this->id_ticket);
        $req->bindValue(':content', $this->content);
        $req->bindValue(':id_user', $this->id_user);
        $req->bindValue(':id', $this->id);
        $req->execute();
    }

    public function delete(){
        $req = $this->bdd->prepare('DELETE FROM `response` WHERE `id`=:id');
        $req->bindValue(':id', $this->id);
        $req->execute();
    }
}