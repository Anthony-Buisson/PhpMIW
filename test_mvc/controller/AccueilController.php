<?php

class   AccueilController extends Controller {

    public function index(){

        $ticket = new Ticket();

        $this->set(['tickets'=>$ticket->getAll()]);
        $this->render('index');
    }
}