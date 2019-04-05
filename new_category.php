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
$title_page = 'New Category';
require 'views/header.view.php';
require 'views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$cat_name = cleardata($_POST['cat_name']);
	$summary = cleardata($_POST['summary']);

	$thumbnail = $_FILES['thumbnail']['tmp_name'];

	$thumbnail_upload = './' . $recipes_config['images_folder'] . $_FILES['thumbnail']['name'];

	move_uploaded_file($thumbnail, $thumbnail_upload);

	$statment = $connect->prepare(
		'INSERT INTO categories (idcategory,cat_name,summary,thumbnail) VALUES (null, :cat_name, :summary, :thumbnail)'
		);

	$statment->execute(array(
		':cat_name' => $cat_name,
		':summary' => $summary,
		':thumbnail' => $_FILES['thumbnail']['name']
		));

	header('Location:' . SITE_URL . '/categories.php');

}

$recents = recently_added($connect);

require 'views/new.category.view.php';
require 'views/footer.view.php';
    
}else {
		header('Location: login.php');		
		}


?>