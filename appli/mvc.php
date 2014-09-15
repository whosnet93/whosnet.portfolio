<?php
// Initialisation
include 'config/initialize.php';
ob_start();

if(isset($_GET['action'])) {



if (!empty($_GET['action'])) {

	$model = dirname(__FILE__).'/controllers/';

	$action = (!empty($_GET['action'])) ? $_GET['action'].'.php' : 'index.php';
	
        

        
	if (is_file($model.$action)) {

            include $model.$action;

	} else {

		include 'controllers/intro.php';
	}

    } 

} else {

	include 'controllers/intro.php';
}

$contenu = ob_get_clean();
include 'config/header.php'; 

echo $contenu;

include 'config/footer.php'; 


$pdo = null;