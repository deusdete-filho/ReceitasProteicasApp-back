<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-8">            
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">Edit Recipe <span class="label label-default">ID <?php echo $recipe['id']; ?></span></h3>
</div>

<div class="panel-body">
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group">

   <input type="hidden" value="<?php echo $recipe['id']; ?>" name="id">
   <label class="control-label">Title</label>
   <input type="text" maxlength="80" value="<?php echo $recipe['title']; ?>" name="title" class="form-control" required>

   <label class="control-label">Description</label>
   <textarea type="text" class="form-control" name="description" id="description" required><?php echo $recipe['description']; ?></textarea>

   <label class="control-label">Ingredients</label>
   <textarea type="text" class="form-control" name="ingredients" id="ingredients" required><?php echo $recipe['ingredients']; ?></textarea>

   <label class="control-label">Preparation</label>
   <textarea type="text" class="form-control" name="preparation" id="preparation" required><?php echo $recipe['preparation']; ?></textarea>

   <label class="control-label">Categories</label>
   <select class="form-control" name="category" required>
   <option value="<?php echo $recipe['category']; ?>" selected><?php echo $recipe['category_name']; ?></option>
    <?php foreach($category_lists as $category_list): ?>
   <option value="<?php echo $category_list['idcategory']; ?>"><?php echo $category_list['cat_name']; ?></option>
    <?php endforeach; ?>
   </select>
  
   
   <label class="control-label">Chef</label>
   <select class="form-control" name="chef" required>
   <option value="<?php echo $recipe['chef']; ?>" selected><?php echo $recipe['chef_name']; ?></option>
    <?php foreach($chef_lists as $chef_list): ?>
   <option value="<?php echo $chef_list['idchef']; ?>"><?php echo $chef_list['chef_name']; ?></option>
    <?php endforeach; ?>
   </select>

   <label class="control-label">Time</label>
   <input type="number" value="<?php echo $recipe['time_r']; ?>" name="time" class="form-control" required="">
   
   <label class="control-label">Servings</label>
   <input type="number" value="<?php echo $recipe['servings']; ?>" name="servings" class="form-control" required="">

   <label class="control-label">Dificult</label>
   <select class="form-control" name="dificult" required>
   <option value="<?php echo $recipe['dificult']; ?>" selected><?php echo $recipe['dificult']; ?></option>
   <option value="Easy">Easy</option>
   <option value="Medium">Medium</option>
   <option value="Difficult">Difficult</option>
   </select>

   <label class="control-label">Featured Image: <a href="<?php echo SITE_URL ?>/images/<?php echo $recipe['image']; ?>" data-lightbox="image-1"><?php echo $recipe['image']; ?></a></label>
   <input name="image" class="input-file" type="file">
   <input type="hidden" value="<?php echo $recipe['image']; ?>" name="image_save">
   <span class="text-danger">Recommended size: <b>1280 x 720 Pixels</b> </span>

   <div class="action-button">
   <input type="submit" name="update" value="Update" class="btn btn-embossed btn-primary">
   <a onclick="alertdelete();">
   <input name="trash" value="Delete" class="btn btn-embossed btn-danger" style="width: 80px;"></a>
    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/delete_recipe.php?id=<?php echo $recipe['id']; ?>" });}
   </script>


   </div>

</div>
</form>  
</div>
</div>
</div>
<div class="col-md-4">   
<?php require'page.sidebar.view.php'; ?>  
</div>
</div>
<script> CKEDITOR.replace( 'description','ingredients' ); CKEDITOR.replace( 'ingredients' ); CKEDITOR.replace( 'preparation' ); </script>
</div>
