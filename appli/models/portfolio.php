<?php
include CHEMIN_LIB.'Db.class.php';

$db = new Db();

$db->bind("type","references");
$result['references'] = $db->query(
	"SELECT * FROM `cadres` AS c 
	LEFT JOIN `references` AS r 
	ON  c.id=r.id
	WHERE c.type = :type");

$db->bind("type","autres");
$result['autres'] = $db->query(
	"SELECT * FROM `cadres` AS c 
	LEFT JOIN `autres` AS a 
	ON  c.id=a.id
	WHERE c.type = :type");

$result['reseaux-sociaux'] = $db->query(
	"SELECT * FROM `reseaux-sociaux`");

$db->CloseConnection();

$fp = fopen('json/results.json', 'w');

$encode = json_encode($result);

//fputs($fp, $encode);
fwrite($fp, $encode."\r\n", strlen($encode));
fclose($fp);

