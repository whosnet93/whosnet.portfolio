<?php
$action = empty($action) ? !empty($_GET['action']) ? $_GET['action'] : 'index' : $action;

// CLASSES & CONFIG
define('CHEMIN_LIB',    'class/');
define('CHEMIN_CONFIG',	'config/');
define('DEFINE_JS',		CHEMIN_CONFIG.'define_js.php');

// MVC
define('CHEMIN_CONTROLLERS',	'appli/controllers/');
define('CHEMIN_MODELS',    		'appli/models/');
define('CHEMIN_VIEWS',    		'appli/views/');
define('DEFAULT_CONTOLLER', CHEMIN_CONTROLLERS.'portfolio.php');

// LOGS & JSON
define('CHEMIN_LOGS',   'logs/');
define('CHEMIN_JSON', 	'json/');
define('JSON_FILE', 	CHEMIN_JSON.'results.json');

// DESIGN
define('CHEMIN_DESIGN',    'design/');
define('CHEMIN_TEMPLATES', 'design/templates/');
define('HEADER', CHEMIN_DESIGN.'header.php');
define('FOOTER', CHEMIN_DESIGN.'footer.php');
// CSS & JS
define('CHEMIN_CSS',	'design/css/');
define('CHEMIN_JS',	'design/js/');

// IMAGES
define('CHEMIN_IMG',	'design/img/');
define('CHEMIN_SLIDES', CHEMIN_IMG.'slides/');
define('CHEMIN_LOGOS', 	CHEMIN_IMG.'logos/');
define('CHEMIN_LIENS', 	CHEMIN_IMG.'liens/');
define('CHEMIN_BG', 	CHEMIN_IMG.'bg/');
define('CHEMIN_ICONS', 	CHEMIN_IMG.'icons/');

// TOOLS
define('CHEMIN_TOOLS',	'tools/');
// LESS
define('LESS_INC',    	'tools/lessphp/lessc.inc.php');
define('LESS_INPUT',    CHEMIN_CSS.'style.less');
define('LESS_OUTPUT',   CHEMIN_CSS.'noedit.css');
define('INCLUDE_LESS',	CHEMIN_CSS.'include.less');
// less variables from define.php
$GLOBALS['less_vars'] = 
"@path_img: '".CHEMIN_IMG."';
@path_slides: '".CHEMIN_SLIDES."';
@path_bg: '".CHEMIN_BG."';
@path_icons: '".CHEMIN_ICONS."';
@path_logos: '".CHEMIN_LOGOS."';
@path_liens: '".CHEMIN_LIENS."';";

// ADRESSES MAIL
define('MAIL_ADMIN',    'regis.dome@gmail.com');
define('MAIL_SUJET',    'Nouveau message de : ');
define('CONTACT_MAIL', 	'contact@whosnet.fr');
