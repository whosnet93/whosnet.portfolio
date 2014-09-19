<?php

/* SESSION */
session_start();
$PHPSESSID=session_id();
header('Content-Type: text/html; charset=UTF-8');

function utilisateur_est_connecte() {
 
    return !empty($_SESSION['id']);
}


/* PHP CONFIG */
ini_set('display_errors',1);
error_reporting(0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);


/* LESS */
// prepare less variables
$fp = fopen(INCLUDE_LESS, 'w');
fwrite($fp, $GLOBALS['less_vars'], strlen($GLOBALS['less_vars']));
fclose($fp);

// initialise less
require LESS_INC;
$less = new lessc;
// compile less file only if is updated
$less->checkedCompile(LESS_INPUT, LESS_OUTPUT);
