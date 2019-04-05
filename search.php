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
$title_page = 'Search';
require 'views/header.view.php';
require 'views/navbar.view.php';    

 $errors = '';   

$connect = connect($database);
if(!$connect){
	header('Location: error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['searching'])) {

	$searching = cleardata($_GET['searching']);

	$statement = $connect->prepare("SELECT recipes.id,recipes.title,recipes.description,recipes.servings,recipes.category,recipes.dificult,recipes.time_r,recipes.ingredients,recipes.preparation,recipes.image,recipes.date_r,categories.cat_name AS 'category_name' ,chefs.chef_name AS 'chef_name' FROM recipes,categories,chefs WHERE recipes.category = categories.idcategory AND recipes.chef = chefs.idchef AND title LIKE :searching");
	$statement->execute(array(':searching' => "%$searching%"));
	$results = $statement->fetchAll();

	if (empty($results)){

		$title = '<div class="alert alert-warning">No results found for: ' . '<strong>' . $searching . '</strong></div>';

	} else {

		$title = '<div class="alert alert-success">Searching results for: ' . '<strong>' . $searching . '</strong></div>';
	}

} else {

	header('Location: home.php');
}

} else {
		header('Location: login.php');	
		}

require 'views/search.view.php';

?>