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
$title_page = 'New Chef';
require 'views/header.view.php';
require 'views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$chef_name = cleardata($_POST['chef_name']);
	$biography = cleardata($_POST['biography']);

	$avatar = $_FILES['avatar']['tmp_name'];

	$avatar_upload = './' . $recipes_config['images_folder'] . $_FILES['avatar']['name'];

	move_uploaded_file($avatar, $avatar_upload);

	$statment = $connect->prepare(
		'INSERT INTO chefs (idchef,chef_name,biography,avatar) VALUES (null, :chef_name, :biography, :avatar)'
		);

	$statment->execute(array(
		':chef_name' => $chef_name,
		':biography' => $biography,
		':avatar' => $_FILES['avatar']['name']
		));

	header('Location:' . SITE_URL . '/chefs.php');

}

$recents = recently_added($connect);

require 'views/new.chef.view.php';
require 'views/footer.view.php';
    
}else {
		header('Location: login.php');		
		}


?>