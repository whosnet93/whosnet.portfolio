<?php
session_start();
$PHPSESSID=session_id();
header('Content-Type: text/html; charset=UTF-8');
include 'config/define.php';
include 'config/functions.php';

function utilisateur_est_connecte() {
 
    return !empty($_SESSION['id']);
}

ini_set('display_errors',1);
error_reporting(0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include 'config/pdo.php';
