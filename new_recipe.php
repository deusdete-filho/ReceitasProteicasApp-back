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
$title_page = 'New Recipe';
require 'views/header.view.php';
require 'views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$title = cleardata($_POST['title']);
	$description = $_POST['description'];
	$ingredients = $_POST['ingredients'];
	$preparation = $_POST['preparation'];
	$category = $_POST['category'];
	$chef = $_POST['chef'];
	$time_r = cleardata($_POST['time']);
	$servings = cleardata($_POST['servings']);
	$dificult = $_POST['dificult'];

	$image = $_FILES['image']['tmp_name'];

	$image_upload = './' . $recipes_config['images_folder'] . $_FILES['image']['name'];

	move_uploaded_file($image, $image_upload);

	$statment = $connect->prepare(
		'INSERT INTO recipes (id,title,description,ingredients,preparation,category,chef,time_r,servings,dificult,image,date_r) VALUES (null, :title, :description, :ingredients, :preparation, :category, :chef, :time_r, :servings, :dificult, :image,CURRENT_TIMESTAMP)'
		);

	$statment->execute(array(
		':title' => $title,
		':description' => $description,
		':ingredients' => $ingredients,
		':preparation' => $preparation,
		':category' => $category,
		':chef' => $chef,
		':time_r' => $time_r,
		':servings' => $servings,
		':dificult' => $dificult,
		':image' => $_FILES['image']['name']
		));

	header('Location:' . SITE_URL . '/home.php');

}

$recents = recently_added($connect);
if(empty($recents)){
	$recents_empty = 'No recipes found';
	}

$category_lists = get_categories($connect);
$chef_lists = get_chefs($connect);

require 'views/new.recipe.view.php';
require 'views/footer.view.php';
    
}else {
		header('Location: login.php');		
		}


?>