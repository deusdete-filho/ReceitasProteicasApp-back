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
$title_page = 'Edit Chef';
require 'views/header.view.php';
require 'views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header ('Location: error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$chef_name = cleardata($_POST['chef_name']);
	$biography = cleardata($_POST['biography']);
	$idchef = cleardata($_POST['idchef']);
	$avatar_save = $_POST['avatar_save'];
	$avatar = $_FILES['avatar'];

	if (empty($avatar['name'])) {
		$avatar = $avatar_save;
	} else{
		$avatar_upload = './' . $recipes_config['images_folder'] . $_FILES['avatar']['name'];
		move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_upload);
		$avatar = $_FILES['avatar']['name'];
	}


$statment = $connect->prepare(
	'UPDATE chefs SET chef_name = :chef_name, biography = :biography, avatar = :avatar WHERE idchef = :idchef'
	);

$statment->execute(array(

		':chef_name' => $chef_name,
		':biography' => $biography,
		':avatar' => $avatar,
		':idchef' => $idchef

		));

header('Location:' . SITE_URL . '/chefs.php');

} else{

$id_chef = id_chef($_GET['id']);
    
if(empty($id_chef)){
	header('Location: home.php');
	}

$chef = get_chef_per_id($connect, $id_chef);
    
    if (!$chef){
    header('Location: home.php');
}

$chef = $chef['0'];

}

$recents = recently_added($connect);

require 'views/edit.chef.view.php';
require 'views/footer.view.php';
    
} else {
		header('Location: login.php');		
		}


?>