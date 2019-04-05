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
$title_page = 'Edit Category';
require 'views/header.view.php';
require 'views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header ('Location: error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$cat_name = cleardata($_POST['cat_name']);
	$summary = cleardata($_POST['summary']);
	$time_r = cleardata($_POST['time']);
	$idcategory = cleardata($_POST['idcategory']);
	$thumbnail_save = $_POST['thumbnail_save'];
	$thumbnail = $_FILES['thumbnail'];

	if (empty($thumbnail['name'])) {
		$thumbnail = $thumbnail_save;
	} else{
		$thumbnail_upload = './' . $recipes_config['images_folder'] . $_FILES['thumbnail']['name'];
		move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnail_upload);
		$thumbnail = $_FILES['thumbnail']['name'];
	}


$statment = $connect->prepare(
	'UPDATE categories SET cat_name = :cat_name, summary = :summary, thumbnail = :thumbnail WHERE idcategory = :idcategory'
	);

$statment->execute(array(

		':cat_name' => $cat_name,
		':summary' => $summary,
		':thumbnail' => $thumbnail,
		':idcategory' => $idcategory

		));

header('Location:' . SITE_URL . '/categories.php');

} else{

$id_category = id_category($_GET['id']);
    
if(empty($id_category)){
	header('Location: home.php');
	}

$category = get_category_per_id($connect, $id_category);
    
    if (!$category){
    header('Location: home.php');
}

$category = $category['0'];

}

$recents = recently_added($connect);

require 'views/edit.category.view.php';
require 'views/footer.view.php';
    
} else {
		header('Location: login.php');		
		}


?>