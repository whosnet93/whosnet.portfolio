<?php
$action = empty($action) ? !empty($_GET['action']) ? $_GET['action'] : 'index' : $action;
define('CONTACT_MAIL', 'contact@whosnet.fr');
define('CHEMIN_LIB',    'class/');
define('CHEMIN_CONTROLLERS',    'appli/');
define('CHEMIN_MODELS',    'appli/models/');
define('CHEMIN_VIEWS',    'appli/views/');
define('CHEMIN_LOGS',    'logs/');


define('PATH_JS','http://'.$_SERVER['SERVER_NAME'].'/action/datas/js/');
define('PATH_CSS','http://'.$_SERVER['SERVER_NAME'].'/action/datas/css/');
define('MAIL_ADMIN',    'regis.dome@gmail.com');
define('MAIL_SUJET',    'Nouveau message de : ');
