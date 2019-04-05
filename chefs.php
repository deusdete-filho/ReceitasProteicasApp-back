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
$title_page = 'Chefs';
require 'views/header.view.php';
require 'views/navbar.view.php';    

$errors = '';   

$connect = connect($database);
if(!$connect){
	header('Location: error.php');
	}

$chefs = get_all_chefs($connect);
 if (empty($chefs)){
     $errors .='<div style="padding: 0px 15px;">No chefs found</div>';
}

$chefs_total = number_chefs($connect);

require 'views/chefs.view.php';
require 'views/footer.view.php';
    
}else {
		header('Location: login.php');		
		}


?>