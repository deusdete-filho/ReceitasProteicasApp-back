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
$title_page = 'Recipes';
require 'views/header.view.php';
require 'views/navbar.view.php';    

$errors = '';   

$connect = connect($database);
if(!$connect){
	header('Location: error.php');
	}
	
$recipes = get_recipes($recipes_config['recipes_per_page'], $connect);
 if (empty($recipes)){
     $errors .='<div style="padding: 0px 15px;">No recipes found</div>';
}

$recipes_total = number_recipes($connect);



require 'views/recipes.view.php';
require 'views/footer.view.php';
    
}else {
		header('Location: login.php');		
		}


?>