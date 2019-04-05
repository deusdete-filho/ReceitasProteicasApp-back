<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-8">
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">New Recipe</h3>
</div>

<div class="panel-body">
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group">

   <label class="control-label">Title</label>
   <input type="text" value="" maxlength="80" placeholder="Title" name="title" class="form-control" required="">

   <label class="control-label">Description</label>
   <textarea type="text" value="" placeholder="Description" class="form-control" name="description" id="description" required=""></textarea>

   <label class="control-label">Ingredients</label>
   <textarea type="text" value="" placeholder="Ingredients" class="form-control" name="ingredients" id="ingredients" required=""></textarea>

   <label class="control-label">Preparation</label>
   <textarea type="text" value="" placeholder="Preparation" class="form-control" name="preparation" id="preparation" required=""></textarea>

   <label class="control-label">Categories</label>
   <select class="form-control" name="category" required="">
    <?php foreach($category_lists as $category_list): ?>
   <option value="<?php echo $category_list['idcategory']; ?>"><?php echo $category_list['cat_name']; ?></option>
    <?php endforeach; ?>
   </select>


   <label class="control-label">Chef</label>
   <select class="form-control" name="chef" required="">
    <?php foreach($chef_lists as $chef_list): ?>
   <option value="<?php echo $chef_list['idchef']; ?>"><?php echo $chef_list['chef_name']; ?></option>
    <?php endforeach; ?>
   </select>

   <label class="control-label">Time</label>
   <input type="number" value="1" placeholder="Time" name="time" class="form-control" required="">

   <label class="control-label">Servings</label>
   <input type="number" value="" name="servings" placeholder="Servings" class="form-control" required="">

   <label class="control-label">Dificult</label>
   <select class="form-control" name="dificult" required="">
   <option value="Fácil">Fácil</option>
   <option value="Médio">Médio</option>
   <option value="Difícil">Difícil</option>
   </select>

   <label class="control-label">Featured Image</label>
   <input name="image" class="input-file" type="file">
   <span class="text-danger">Recommended size: <b>1280 x 720 Pixels</b> </span>

   <div class="action-button">
   <input type="submit" name="save" value="Save" class="btn btn-embossed btn-primary">
   <input type="reset" name="reset" value="Reset" class="btn btn-embossed btn-danger">
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
