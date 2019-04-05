<form name="searching" id="search-page" action="<?php echo SITE_URL; ?>/search.php" method="GET" role="search">
<div class="form-group">
<div class="input-group">
<input class="form-control" name="searching" type="search" placeholder="Search recipes...">
<span class="input-group-btn"><button type="submit" class="btn"><span class="fui-search"></span></button>
</span></div></div></form>

<div class="panel panel-default">
<div class="panel-body">

<a href="<?php echo SITE_URL; ?>/new_recipe.php" type="button" class="btn btn-info btn-sm" aria-haspopup="true" aria-expanded="false">Add Recipe </a>

<a href="<?php echo SITE_URL; ?>/new_category.php" type="button" class="btn btn-info btn-sm" aria-haspopup="true" aria-expanded="false">Add Category </a>

<a href="<?php echo SITE_URL; ?>/new_chef.php" type="button" class="btn btn-info btn-sm" aria-haspopup="true" aria-expanded="false">Add Chef </a>

<a href="<?php echo SITE_URL; ?>/json.php" type="button" class="btn btn-info btn-sm" aria-haspopup="true" aria-expanded="false">Generate Json </a>

</div></div>