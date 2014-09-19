<?php include '../config/pdo.php' ?>

    
<?php 
        
        
ob_start();

if(isset($_GET['action'])) {

if (!empty($_GET['action'])) {

	$model = dirname(__FILE__).'/controllers/';

	$action = (!empty($_GET['action'])) ? $_GET['action'].'.php' : 'index.php';
	
	if (is_file($model.$action)) {

            include $model.$action;

	} else {

                echo 'erreur';
	}

    } 

} else {

                echo 'erreur';
                
}

$contenu = ob_get_clean();
include 'header.php'; 

echo $contenu;

include 'footer.php';    
        
        
        
?>
        
        
        

