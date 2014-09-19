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

$less_vars = 
"@path_img: '".CHEMIN_IMG."';
@path_slides: '".CHEMIN_SLIDES."';
@path_bg: '".CHEMIN_BG."';
@path_icons: '".CHEMIN_ICONS."';
@path_logos: '".CHEMIN_LOGOS."';
@path_liens: '".CHEMIN_LIENS."';";

fwrite($fp, $less_vars, strlen($less_vars));
fclose($fp);

// initialise less
require LESS_INC;
$less = new lessc;
// compile less file only if is updated
$less->checkedCompile(LESS_INPUT, LESS_OUTPUT);
