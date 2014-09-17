<?php
function dojson2() {
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM timeline ORDER BY date_event ASC";
$q = $pdo->prepare($sql);
$q->execute();
Database::disconnect();



$response = array();
$posts = array();

$pdo = Database::connect();
$sql = "SELECT * FROM timeline ORDER BY date_event ASC";
foreach ($pdo->query($sql) as $row) {
            $datesyear[date('Y',strtotime($row['date_event']))][] = $row;
            }
        
      
$posts[] =  $datesyear;            

//$response['posts'] = $posts;

$fp = fopen('json/results.json', 'w');

$encode = json_encode($posts[0]);


//fputs($fp, $encode);
fwrite($fp, $encode."\r\n", strlen($encode));
fclose($fp);
}

include CHEMIN_LIB.'Db.class.php';

$db = new Db();

$db->bind("type","references");
$references = $db->query("SELECT * FROM `cadres` AS c 
	LEFT JOIN `references` AS r 
	ON  c.id=r.id
	WHERE c.type = :type");


// $fp = fopen('json/results.json', 'w');

// $encode = json_encode($posts[0]);


// //fputs($fp, $encode);
// fwrite($fp, $encode."\r\n", strlen($encode));
// fclose($fp);

?>