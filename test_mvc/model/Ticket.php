<?php

class Ticket extends Model {
    public $id;
    public $title;
    public $content;
    public $priority;
    public $id_user;
    public $attached_file;

    public function __construct($id=null){
        parent::__construct();
        if(!is_null($id)){
            $req = $this->bdd->prepare('SELECT * FROM ticket WHERE id=:id');
            $req->bindValue(':id', $id);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            $this->id = $data['id'];
            $this->title = $data['title'];
            $this->content = $data['content'];
            $this->priority = $data['priority'];
            $this->id_user = $data['id_user'];
            $this->attached_file = $data['attached_file'];
        }
    }

    public function save(){
        $this->id != null ? $this->update() : $this->create();
    }

    public function getAll(){
        $req = $this->bdd->prepare('SELECT * FROM ticket;');
        $req->execute();
        return $req->fetchAll();
    }

    public function getUser(){
        $req = $this->bdd->prepare('SELECT * FROM `user` WHERE id=:id_user;');
        $req->bindValue(':id_user', $this->id_user);
        $req->execute();
        return $req->fetch();
    }

    public function getResponse(){
        $req = $this->bdd->prepare('SELECT * FROM `response` WHERE id_ticket=:id;');
        $req->bindValue(':id', $this->id);
        $req->execute();
        return $req->fetchAll();
    }

    public function create(){
        $req = $this->bdd->prepare('INSERT INTO ticket (title, content, priority, id_user, attached_file) VALUE (:title, :content, :priority, :id_user, :attached_file)');
        $req->bindValue(':title', $this->title);
        $req->bindValue(':content', $this->content);
        $req->bindValue(':priority', $this->priority);
        $req->bindValue(':id_user', $this->id_user);
        $req->bindValue(':attached_file', $this->attached_file);
        $req->execute();
        $this->id = $this->bdd->lastInsertId();
    }

    public function update(){
        $req = $this->bdd->prepare('UPDATE `ticket` SET `title`=:title,`content`=:content,`priority`=:priority,`id_user`=:id_user,`attached_file`=:attached_file WHERE `id`=:id');
        $req->bindValue(':title', $this->title);
        $req->bindValue(':content', $this->content);
        $req->bindValue(':priority', $this->priority);
        $req->bindValue(':id_user', $this->id_user);
        $req->bindValue(':attached_file', $this->attached_file);
        $req->bindValue(':id', $this->id);
        $req->execute();
    }

    public function delete(){
        $req = $this->bdd->prepare('DELETE FROM `ticket` WHERE `id`=:id; DELETE FROM `response` WHERE `id_ticket`=:id');
        $req->bindValue(':id', $this->id);
        $req->execute();
    }
}