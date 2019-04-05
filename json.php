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
$title_page = 'Json Files';
require 'views/header.view.php';
require 'views/navbar.view.php';

$errors_recipes = '';
$success_recipes = '';

$errors_categories = '';
$success_categories = '';

$errors_chefs = '';
$success_chefs = '';

$connect = connect($database);
if(!$connect){
    header('Location: error.php');
    }

$recipes_total = number_recipes($connect);
$categories_total = number_categories($connect);
$chefs_total = number_chefs($connect);



$recipes = number_recipes($connect);
 	if (empty($recipes)){
     $errors_recipes .='<span class="label label-danger">No Data Found</span>';
	}else{
	 $success_recipes .='<a href=" ' . SITE_URL . '/json_recipes.php"><span class="label label-success">JSON</span></a>';
	}

$categories = number_categories($connect);
 	if (empty($categories)){
     $errors_categories .='<span class="label label-danger">No Data Found</span>';
	}else{
	 $success_categories .='<a href=" ' . SITE_URL . '/json_categories.php"><span class="label label-success">JSON</span></a>';
	}

$chefs = number_chefs($connect);
 	if (empty($chefs)){
     $errors_chefs .='<span class="label label-danger">No Data Found</span>';
	}else{
	 $success_chefs .='<a href=" ' . SITE_URL . '/json_chefs.php"><span class="label label-success">JSON</span></a>';
	}

require 'views/json.view.php';
require 'views/footer.view.php';

}else {
        header('Location: login.php');
        }


?>
