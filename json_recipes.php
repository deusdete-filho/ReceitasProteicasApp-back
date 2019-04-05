<?php


/*--------------------*/
// App Name: Soillona
// Description: Soillona Ionic App
// Author: Geordliner
// Author URI: https://themeforest.net/user/geordliner/portfolio
// Version: 1.00
/*--------------------*/

header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="recipes.json"');

    require 'admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT recipes.id,recipes.title,recipes.chef,recipes.category,recipes.description,recipes.servings,recipes.category,recipes.dificult,recipes.time_r,recipes.ingredients,recipes.preparation,recipes.image,chefs.avatar,categories.thumbnail,categories.cat_name AS 'category_name' ,chefs.chef_name AS 'chef_name' FROM recipes,categories,chefs WHERE recipes.category = categories.idcategory AND recipes.chef = chefs.idchef";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$recipes = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{ 

    $title = $row['title'];
    $description = $row['description'];
    $servings = $row['servings'];
    $category = $row['category'];
    $category_name = $row['category_name'];
    $thumbnail = $row['thumbnail'];
    $chef = $row['chef'];
    $chef_name = $row['chef_name'];
    $dificult = $row['dificult'];
    $time_r = $row['time_r'];
    $ingredients = $row['ingredients'];
    $preparation = $row['preparation'];
    $image = $row['image'];
    $avatar = $row['avatar'];

    $recipes[] = array('id'=> $id++, 'title'=> $title, 'description'=> $description, 'servings'=> $servings, 'category'=> $category,'category_name'=> $category_name,'thumbnail'=> $thumbnail, 'chef'=> $chef,'chef_name'=> $chef_name, 'dificult'=> $dificult, 'time_r'=> $time_r, 'ingredients'=> $ingredients, 'preparation'=> $preparation, 'image'=> $image, 'avatar'=> $avatar);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"recipes":' . json_encode($recipes) . '}';
print ($json_string)

?>
