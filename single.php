<?php 

/*--------------------*/
// App Name: Soillona
// Description: Soillona Ionic App
// Author: Geordliner
// Author URI: https://themeforest.net/user/geordliner/portfolio
// Version: 1.00
/*--------------------*/

session_start();
if (isset($_SESSION['username'])){
    
    
require 'admin/config.php';
require 'admin/functions.php';	
$title_page = 'Single Post';  
require 'views/header.view.php';
require 'views/navbar.view.php';


$connect = connect($database);

$id_recipe = id_recipe($_GET['id']);
    
if(!$connect){
	header('Location: error.php');
	}
    
if (empty($id_recipe)){
	
    header ('Location: error.php');
}

$recipe = get_recipe_per_id($connect, $id_recipe);
    
    if (empty($recipe)){
    header('Location: home.php');
}
    
$recipe = $recipe['0'];
    
require 'views/single.view.php';
require 'views/footer.view.php';
    
}else {
		header('Location: login.php');	
		}


?>