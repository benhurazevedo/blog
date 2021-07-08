<?php 
use \Slim\App;

require_once "bootstrap.php";

$app = new App($AppConfig);

session_start();

require_once "dependencies.php";

require_once "routes.php";

$app->run();