<?php

define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOTDIR', dirname(__FILE__));
// => /php/1/mvc/
//var_dump(dirname(__FILE__));

require_once './core/Controller.php';
require_once './core/Model.php';
require_once './model/Ticket.php';
require_once './model/User.php';
require_once './model/Response.php';

$data = explode('/', $_GET['p']);

$data[0] = empty($data[0])?'Accueil':$data[0];
$data[1] = empty($data[1])?'index':$data[1];
$controller = ucfirst($data[0]).'Controller';
$controllerFilename = './controller/'.$controller.'.php';
if(file_exists($controllerFilename)){
    require_once $controllerFilename;
}else{
    die('Controller not found');
}

$controller = new $controller();
$action = $data[1];
if(method_exists($controller, $action)){
    $controller->$action();
}else{
    die('method '.$action.' not found');
}
