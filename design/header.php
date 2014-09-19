<!DOCTYPE html>
<!--

___  ___      _   _     _                      _               _          _ 
|  \/  |     | | | |   (_)                    | |             (_)        | |
| .  . | __ _| |_| |__  _  __ _ ___   ___  ___| |__  _ __ ___  _  ___  __| |
| |\/| |/ _` | __| '_ \| |/ _` / __| / __|/ __| '_ \| '_ ` _ \| |/ _ \/ _` |
| |  | | (_| | |_| | | | | (_| \__ \ \__ \ (__| | | | | | | | | |  __/ (_| |
\_|  |_/\__,_|\__|_| |_|_|\__,_|___/ |___/\___|_| |_|_| |_| |_|_|\___|\__,_|
                                                                            
                                                              www.whosnet.fr
                     Développement Web & design : Régis Domé & Fred Hasselot


-->
<html>
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="<?php echo CHEMIN_CSS ?>noedit.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<script src="http://code.jquery.com/jquery-latest.min.js"  type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.js"></script>
<?php include CHEMIN_CONFIG.'define_js.php' ?> 
<?php if (!isset($_GET["action"])) { echo "<script type=\"text/javascript\" src=\"".CHEMIN_JS."loading.js\"></script>"; } ?>

<script type="text/javascript" src="<?php echo CHEMIN_JS ?>script.js"></script>


</head>

<body <?php if(empty($_GET['action'])) { echo 'onload="start()"'; }?>>
<div id="main">
    
