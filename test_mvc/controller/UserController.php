<?php

class UserController extends Controller{

    public function liste(){
        $users = new User();
        $users = $users->getAll();
        $this->set(['users'=>$users]);
        $this->render('liste');
    }

    public function detail(){
        if(isset($_GET['id'])) $id = (int) $_GET['id'];
        else{
            header('Location: '. ROOT.'user/liste');
            return;
        }
        $user = new User($id);
        $this->set(['user'=>$user]);
        $this->render('detail');
    }

    public function ajouter_modifier(){
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $user = new User($id);
        $this->set(['user'=> $user]);
        $this->render('update');
    }
    public function post(){
        $user = new User();
        $user->name = $_POST['name'];
        $user->id = isset($_POST['id']) ? (int)$_POST['id'] : null;
        $user->save();
        isset($_POST['id']) ? header('Location: '. ROOT.'user/detail?id='.$user->id) : header('Location: '. ROOT.'user/liste');
    }

    public function tickets(){
        if(isset($_GET['id'])) $id = (int) $_GET['id'];
        else{
            header('Location: '. ROOT.'user/liste');
            return;
        }
        $user = new User($id);
        $tickets = $user->getTickets();
        $this->set(['tickets'=>$tickets, 'user'=>$user]);
        $this->render('tickets');
    }

    public function supprimer(){
        if(isset($_GET['id'])){
            $id = (int) $_GET['id'];
            $user = new User($id);
            $user->delete();
        }
        header('Location: '. ROOT.'user/liste');
    }
}