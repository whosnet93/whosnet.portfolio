<?php
// Initialisation
include 'config/define.php';
include CHEMIN_CONFIG.'initialize.php';
ob_start();

if(isset($_GET['action'])) {



if (!empty($_GET['action'])) {

	$action = (!empty($_GET['action'])) ? $_GET['action'].'.php' : 'index.php';
	
        
	if (is_file(CHEMIN_CONTROLLERS.$action)) {

            include CHEMIN_CONTROLLERS.$action;

	} else {

		include DEFAULT_CONTOLLER;
	}

    } 

} else {

	include DEFAULT_CONTOLLER;
}

$contenu = ob_get_clean();
include HEADER; 

echo $contenu;

include FOOTER; 