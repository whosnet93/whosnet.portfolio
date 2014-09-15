<?php
include CHEMIN_MODELS.'intro.php';

if(isset($_GET['action']) && $_GET['action'] == 'intro') {
    header('location: http://'.$_SERVER['SERVER_NAME'].'/');
    exit();
            
}

include CHEMIN_VIEWS.'intro.php';

?>
