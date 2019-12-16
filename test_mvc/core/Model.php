<?php

class Model{

    private static $instance;

    public $bdd;

    public function __construct(){
        if(is_null(self::$instance)){
            $this->bdd = new PDO('mysql:dbname=bdtickets;host=localhost;charset=UTF8'
                ,'root',''
                , array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
        }
    }

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new Model();
        }
        return self::$instance;
    }
}