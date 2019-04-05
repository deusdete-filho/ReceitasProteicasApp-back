<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10">            
<div class="container-fluid">
<div class="row-top row">

<a href="#"><div class="col-xs-6 col-md-4">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon glyphicon-cutlery"></i></span>
<div class="info-box-content">
<span class="info-box-text">Recipes</span>
<span class="info-box-number"><?php echo $recipes_total; ?></span></div>
</div></div></a>

<a href="<?php echo SITE_URL; ?>/categories.php"><div class="col-xs-6 col-md-4">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon glyphicon-tags"></i></span>
<div class="info-box-content">
<span class="info-box-text">Categories</span>
<span class="info-box-number"><?php echo $categories_total; ?></span></div>
</div></div></a>

<a href="<?php echo SITE_URL; ?>/chefs.php"><div class="col-xs-6 col-md-4">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon glyphicon-user"></i></span>
<div class="info-box-content">
<span class="info-box-text">Chefs</span>
<span class="info-box-number"><?php echo $chefs_total; ?></span></div>
</div></div></a>


</div>
<div class="row-table row">
<table class="ui single line table">
<thead>
<tr>
<th>Id</th>
<th>Image</th>
<th>Title</th>
<th>Description</th>
<th>Category</th>
<th>Ser.</th>
<th>Time</th>
<th>Dificult</th>
<th>Ingredients</th>
<th>Preparation</th>
<th>Chef</th>
<th>Actions</th>
</tr>
</thead>
<?php foreach($recipes as $recipe): ?>
<tr class="table-fields">
<td><?php echo $recipe['id']; ?></td>
<td style="width: 50px;"><a href="<?php echo SITE_URL ?>/images/<?php echo $recipe['image']; ?>" data-lightbox="image-1"><img class="media-object" id="image-home" src="<?php echo SITE_URL ?>/images/<?php echo $recipe['image']; ?>" alt="<?php echo $recipe['title']; ?>"></a></td>
<td><span title="<?php echo $recipe['title']; ?>"><?php echo $recipe['title']; ?></span></td>
<td><span title="<?php echo cleardata($recipe['description']); ?>"><?php echo cleardata($recipe['description']); ?></span></td>
<td><span title="<?php echo $recipe['category_name']; ?>"><?php echo $recipe['category_name']; ?></span></td>
<td><span title="<?php echo $recipe['servings']; ?>"><?php echo $recipe['servings']; ?></span></td>
<td><span title="<?php echo $recipe['time_r']; ?>"><?php echo $recipe['time_r']; ?></span></td>
<td><span title="<?php echo $recipe['dificult']; ?>"><?php echo $recipe['dificult']; ?></span></td>
<td><span title="<?php echo cleardata($recipe['ingredients']); ?>"><?php echo cleardata($recipe['ingredients']); ?></span></td>
<td><span title="<?php echo cleardata($recipe['preparation']); ?>"><?php echo cleardata($recipe['preparation']); ?></span></td>
<td><span title="<?php echo $recipe['chef_name']; ?>"><?php echo $recipe['chef_name']; ?></span></td>
<td class="actions">

 <a href="<?php echo SITE_URL ?>/edit_recipe.php?id=<?php echo $recipe['id']; ?>">
<button type="button" class="btn btn-embossed btn-default btn-sm" style="width: 100%;margin-bottom: 5px;">Edit</button></a>
<a onclick="alertdelete();" class="btn btn-embossed btn-danger btn-sm" style="width: 100%;margin-bottom: 5px;">Delete</a>
<script type="text/javascript">
  function alertdelete() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/delete_recipe.php?id=<?php echo $recipe['id']; ?>" });}
  </script>
</td>
</tr>
<?php endforeach; ?>
</table>
<?php if( !empty($errors)): ?>
<?php echo $errors; ?>    
<?php endif; ?>
</div>
</div>
<?php require 'pagination.php'; ?>           
</div>
<div class="col-md-2">   
<?php require'sidebar.view.php'; ?>  
</div>
</div>
</div>

