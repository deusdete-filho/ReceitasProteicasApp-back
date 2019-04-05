<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-8">            
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">New Category</h3>
</div>

<div class="panel-body">
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group">

   <label class="control-label">Name</label>
   <input type="text" value="" maxlength="35" placeholder="Name" name="cat_name" class="form-control" required="">

   <label class="control-label">Summary</label>
   <textarea type="text" maxlength="250" value="" rows="4" placeholder="Summary" class="form-control" name="summary" required=""></textarea>

   <label class="control-label">Thumbnail</label>
   <input name="thumbnail" class="input-file" type="file" required="">
   <span class="text-danger">Recommended size: <b>800 x 350 Pixels</b> </span>

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
</div>
