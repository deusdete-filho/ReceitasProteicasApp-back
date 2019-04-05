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
$title_page = 'Delete Chef';
require 'views/header.view.php';
require 'views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: error.php');
	} 

$id_chef = cleardata($_GET['id']);

if(!$id_chef){
	header('Location: ' . SITE_URL . '/home.php');
}

$statement = $connect->prepare('DELETE FROM chefs WHERE idchef = :idchef');
$statement->execute(array('idchef' => $id_chef));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else {
		header('Location: login.php');		
		}


?>