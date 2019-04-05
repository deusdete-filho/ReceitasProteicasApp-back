<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10">            
<div class="container-fluid">
<div class="row-top row">
<?php echo $title ?>
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
<?php foreach($results as $recipe): ?>
<tr class="table-fields">
<td><?php echo $recipe['id']; ?></td>
<td style="width: 125px;"><img class="media-object" id="image-home" src="<?php echo SITE_URL ?>/images/<?php echo $recipe['image']; ?>" alt="<?php echo $recipe['title']; ?>"></td>
<td><?php echo $recipe['title']; ?></td>
<td><?php echo cleardata($recipe['description']); ?></td>
<td><?php echo $recipe['category_name']; ?></td>
<td><?php echo $recipe['servings']; ?></td>
<td><?php echo $recipe['time_r']; ?></td>
<td><?php echo $recipe['dificult']; ?></td>
<td><?php echo cleardata($recipe['ingredients']); ?></td>
<td><?php echo cleardata($recipe['preparation']); ?></td>
<td><?php echo $recipe['chef_name']; ?></td>
<td class="actions">
<button type="button" class="btn btn-embossed btn-default btn-sm" style="width: 100%;margin-bottom: 5px;">Edit</button>
<button type="button" class="btn btn-embossed btn-danger btn-sm" style="width: 100%;">Trash</button></td>
</tr>
<?php endforeach; ?>
<?php if( !empty($errors)): ?>
<?php echo $errors; ?>    
<?php endif; ?>
</table>
</div>
</div>
<?php require 'pagination.php'; ?>           
</div>
<div class="col-md-2">   
<?php require'sidebar.view.php'; ?>  
</div>
</div>
</div>