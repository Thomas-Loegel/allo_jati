<?php
require_once 'vendor/autoload.php';

$router = new Router($_GET['url']);

//liste de nos routes
$router->get("/",function(){
   echo "HOME";
});

$router->run();