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
$title_page = 'Edit Recipe';
require 'views/header.view.php';
require 'views/navbar.view.php';

$connect = connect($database);
if(!$connect){
	header ('Location: error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$id = cleardata($_POST['id']);
	$title = cleardata($_POST['title']);
	$description = $_POST['description'];
	$ingredients = $_POST['ingredients'];
	$preparation = $_POST['preparation'];
	$category = $_POST['category'];
	$chef = $_POST['chef'];
	$time_r = cleardata($_POST['time']);
	$servings = cleardata($_POST['servings']);
	$dificult = $_POST['dificult'];
	$image_save = $_POST['image_save'];
	$image = $_FILES['image'];

	if (empty($image['name'])) {
		$image = $image_save;
	} else{
		$image_upload = './' . $recipes_config['images_folder'] . $_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'], $image_upload);
		$image = $_FILES['image']['name'];
	}


$statment = $connect->prepare(
	'UPDATE recipes SET title = :title, description = :description, ingredients = :ingredients, preparation = :preparation, category = :category, chef = :chef, time_r = :time_r, servings = :servings, dificult = :dificult, image = :image WHERE id = :id'
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
		':image' => $image,
		':id' => $id

		));

header('Location:' . SITE_URL . '/recipes.php');

} else{

$id_recipe = id_recipe($_GET['id']);
    
if(empty($id_recipe)){
	header('Location: home.php');
	}

$recipe = get_recipe_per_id($connect, $id_recipe);
    
    if (!$recipe){
    header('Location: home.php');
}

$recipe = $recipe['0'];

}

$recents = recently_added($connect);
$category_lists = get_categories($connect);
$chef_lists = get_chefs($connect);

require 'views/edit.recipe.view.php';
require 'views/footer.view.php';
    
}else {
		header('Location: login.php');		
		}


?>