<?php

function connect($database){
    try{
        $connect = new PDO('mysql:host=localhost;dbname='. $database['db'], $database['user'], $database['pass']);
        return $connect;
        
    }catch (PDOException $e){
        return false;
    }
}

function cleardata($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars ($data);
    return $data;
}

function actual_page(){
    
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}


function get_recipes($recipes_per_page, $connect)
{
    $home = (actual_page() > 1) ? actual_page() * $recipes_per_page - $recipes_per_page : 0;
    $sentence = $connect->prepare("

        SELECT SQL_CALC_FOUND_ROWS recipes.id,recipes.title,recipes.description,recipes.servings,recipes.category,recipes.dificult,recipes.time_r,recipes.ingredients,recipes.preparation,recipes.image,recipes.date_r,categories.cat_name AS 'category_name' ,chefs.chef_name AS 'chef_name' FROM recipes,categories,chefs WHERE recipes.category = categories.idcategory AND recipes.chef = chefs.idchef ORDER BY recipes.date_r DESC LIMIT $home, $recipes_per_page");
    
    $sentence->execute();
    return $sentence->fetchAll();
}

function number_pages($recipes_per_page, $connect){

    $total_recipes = $connect->prepare('SELECT FOUND_ROWS() AS total');
    $total_recipes->execute();
    $total_recipes = $total_recipes->fetch()['total'];

    $number_pages = ceil($total_recipes / $recipes_per_page);
    return $number_pages;
}


function id_recipe($id){
    return (int)cleardata($id);
}

function get_recipe_per_id($connect, $id){
    $sentence = $connect->query("SELECT recipes.id,recipes.title,recipes.description,recipes.servings,recipes.category,recipes.chef,recipes.dificult,recipes.time_r,recipes.ingredients,recipes.preparation,recipes.image,recipes.date_r,categories.cat_name AS 'category_name' ,chefs.chef_name AS 'chef_name' FROM recipes,categories,chefs WHERE id = $id AND recipes.category = categories.idcategory AND recipes.chef = chefs.idchef LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function recently_added($connect){

$sentence = $connect->prepare('SELECT * FROM recipes ORDER BY date_r DESC LIMIT 8');
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_all_categories($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM categories"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_category($id_cat){
    return (int)cleardata($id_cat);
}

function get_category_per_id($connect, $id_cat){
    $sentence = $connect->query("SELECT * FROM categories WHERE idcategory = $id_cat LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_all_chefs($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM chefs"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_chef($id_chef){
    return (int)cleardata($id_chef);
}

function get_chef_per_id($connect, $id_chef){
    $sentence = $connect->query("SELECT * FROM chefs WHERE idchef = $id_chef LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_recipes($connect){

$total_recipes = $connect->prepare('SELECT * FROM recipes');
$total_recipes->execute(array());
$total_recipes->fetchAll();
$total = $total_recipes->rowCount();
return $total;

}


function number_categories($connect){

$total_categories = $connect->prepare('SELECT * FROM categories');
$total_categories->execute(array());
$total_categories->fetchAll();
$total = $total_categories->rowCount();
return $total;

}


function number_chefs($connect){

$total_chefs = $connect->prepare('SELECT * FROM chefs');
$total_chefs->execute(array());
$total_chefs->fetchAll();
$total = $total_chefs->rowCount();
return $total;

}

function get_categories($connect){

$sentence = $connect->prepare('SELECT * FROM categories');
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_chefs($connect){

$sentence = $connect->prepare('SELECT * FROM chefs');
$sentence->execute(array());
return $sentence->fetchAll();

}

?>