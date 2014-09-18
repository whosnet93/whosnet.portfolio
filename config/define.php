<?php
$action = empty($action) ? !empty($_GET['action']) ? $_GET['action'] : 'index' : $action;

define('CHEMIN_LIB',    'class/');
define('CHEMIN_CONFIG',    'config/');

define('CHEMIN_CONTROLLERS',    'appli/controllers/');
define('CHEMIN_MODELS',    'appli/models/');
define('CHEMIN_VIEWS',    'appli/views/');

define('CHEMIN_LOGS',    'logs/');
define('CHEMIN_JSON', 'json/');
define('JSON_FILE', CHEMIN_JSON.'results.json');

define('DEFAULT_CONTOLLER', CHEMIN_CONTROLLERS.'portfolio.php');

define('CHEMIN_DESIGN',    'design/');
define('CHEMIN_TEMPLATES', 'design/templates/');
define('HEADER', CHEMIN_DESIGN.'header.php');
define('FOOTER', CHEMIN_DESIGN.'footer.php');

define('CHEMIN_JS','http://'.$_SERVER['SERVER_NAME'].'/design/js/');
define('CHEMIN_CSS','http://'.$_SERVER['SERVER_NAME'].'/design/css/');
define('CHEMIN_IMG','http://'.$_SERVER['SERVER_NAME'].'/design/img/');

define('CHEMIN_SLIDES', CHEMIN_IMG.'slides/');
define('CHEMIN_LOGOS', CHEMIN_IMG.'logos/');
define('CHEMIN_LIENS', CHEMIN_IMG.'liens/');
define('CHEMIN_BG', CHEMIN_IMG.'bg/');
define('CHEMIN_ICONS', CHEMIN_IMG.'icons/');


define('MAIL_ADMIN',    'regis.dome@gmail.com');
define('MAIL_SUJET',    'Nouveau message de : ');
define('CONTACT_MAIL', 'contact@whosnet.fr');
