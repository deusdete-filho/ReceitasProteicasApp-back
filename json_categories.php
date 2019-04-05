<?php

/*--------------------*/
// App Name: Soillona
// Description: Soillona Ionic App
// Author: Geordliner
// Author URI: https://themeforest.net/user/geordliner/portfolio
// Version: 1.00
/*--------------------*/

header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="categories.json"');

    require 'admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM categories";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$categories = array();

while($row = mysqli_fetch_array($result)) 
{ 
	$idcategory = $row['idcategory'];
    $cat_name = $row['cat_name'];
    $summary = $row['summary'];
    $thumbnail = $row['thumbnail'];

    $categories[] = array('idcategory'=> $idcategory, 'cat_name'=> $cat_name, 'summary'=> $summary, 'thumbnail'=> $thumbnail);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"categories":' . json_encode($categories) . '}';
print ($json_string)

?>
