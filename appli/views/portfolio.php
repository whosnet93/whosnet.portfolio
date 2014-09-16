<?php

$jsonData = json_decode(file_get_contents('json/results.json'));

echo '<pre>';
print_r($jsonData); 
echo '</pre>';

?>