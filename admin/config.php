<?php

/*--------------------*/
// App Name: Soillona
// Description: Soillona Ionic App
// Author: Geordliner
// Author URI: https://themeforest.net/user/geordliner/portfolio
// Version: 1.00
/*--------------------*/

//URL PROJECT

define ('SITE_URL', 'http://localhost:8888/receitasproteicas');

//DATABASE CONFIGURATION

$database = array(
'host' => 'localhost',
'db' => 'recipes_db',
'user' => 'root',
'pass' => 'root'
);


$recipes_config = array(

    'recipes_per_page' => '8',
    'images_folder' => 'images/'
);


?>
