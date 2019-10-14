<?php
//Start session
session_start();

//Require config file
require('app/config/config.php');

//Include base classes
require('app/core/Bootstrap.php');
require('app/core/Controller.php');
require('app/core/Model.php');
require('app/core/functions.php');

//Include controllers
require('app/controllers/home.php');
require('app/controllers/users.php');
require('app/controllers/desavanje.php');
require('app/controllers/ssluzba.php');
require('app/controllers/student.php');
require('app/controllers/profesor.php');
require('app/controllers/skola.php');
require('app/controllers/studije.php');
//Include models
require('app/models/home.php');
require('app/models/user.php');
require('app/models/desavanje.php');
require('app/models/ssluzba.php');
require('app/models/student.php');
require('app/models/profesor.php');
require('app/models/skola.php');
require('app/models/studije.php');


$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller){
	$controller->executeAction();
}

?>
