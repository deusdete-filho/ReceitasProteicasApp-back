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
$title_page = 'Categories';
require 'views/header.view.php';
require 'views/navbar.view.php';    

$errors = '';   

$connect = connect($database);
if(!$connect){
	header('Location: error.php');
	}

$categories = get_all_categories($connect);
 if (empty($categories)){
     $errors .='<div style="padding: 0px 15px;">No categories found</div>';
}

$categories_total = number_categories($connect);

require 'views/categories.view.php';
require 'views/footer.view.php';
    
}else {
		header('Location: login.php');		
		}


?>