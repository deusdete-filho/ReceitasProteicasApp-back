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
$title_page = 'Soillona Backend';
require 'views/header.view.php';
require 'views/navbar.view.php';    

$errors = '';   

$connect = connect($database);
if(!$connect){
	header('Location: error.php');
	}
	
$recipes_total = number_recipes($connect);
$categories_total = number_categories($connect);
$chefs_total = number_chefs($connect);

$recipes = get_recipes($recipes_config['recipes_per_page'], $connect);
 if (empty($recipes)){
     $errors .='<div class="alert alert-warning">No recipes found</div>';
}


require 'views/home.view.php';
require 'views/footer.view.php';
    
}else {
		header('Location: login.php');		
		}


?>