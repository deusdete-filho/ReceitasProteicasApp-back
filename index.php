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
    
    header('Location: home.php');
} else {
    
    header('Location: login.php');
}



?>