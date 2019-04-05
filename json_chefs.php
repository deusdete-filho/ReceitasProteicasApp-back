<?php


/*--------------------*/
// App Name: Soillona
// Description: Soillona Ionic App
// Author: Geordliner
// Author URI: https://themeforest.net/user/geordliner/portfolio
// Version: 1.00
/*--------------------*/


header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="chefs.json"');

    require 'admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM chefs";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$chefs = array();

while($row = mysqli_fetch_array($result)) 
{ 
	$idchef = $row['idchef'];
    $chef_name = $row['chef_name'];
    $biography = $row['biography'];
    $avatar = $row['avatar'];

    $chefs[] = array('idchef'=> $idchef, 'chef_name'=> $chef_name, 'biography'=> $biography, 'avatar'=> $avatar);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"chefs":' . json_encode($chefs) . '}';
print ($json_string)

?>
