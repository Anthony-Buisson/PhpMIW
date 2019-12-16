<?php

class ResponseController extends Controller{

    public function liste(){
        $responses = new Response();
        $responses = $responses->getAll();
        $this->set(['responses'=>$responses]);
        $this->render('liste');
    }

    public function ajouter_modifier(){
        $id_ticket = isset($_GET['id_ticket']) ? (int)$_GET['id_ticket'] : null;
        $response = new Response();
        $response->id_ticket = $id_ticket;
        $users = new User();
        $this->set(['response'=> $response, 'users'=>$users->getAll()]);
        $this->render('update');
    }

    public function post(){
        $response = new Response();
        $response->id_ticket = $_POST['id_ticket'];
        $response->id_user = $_POST['id_user'];
        $response->content = $_POST['content'];
        $response->save();
        header('Location: '. ROOT.'ticket/detail?id='.$response->id_ticket);
    }

    public function supprimer(){
        if(isset($_GET['id'])){
            $id = (int) $_GET['id'];
            $response = new Response($id);
            $response->delete();
            header('Location: '. ROOT.'ticket/detail?id='.$response->id_ticket);
        }
        else {
            header('Location: ' . ROOT . 'ticket/liste');
        }
    }
}