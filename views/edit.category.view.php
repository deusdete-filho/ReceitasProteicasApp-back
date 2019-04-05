<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-8">            
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">Edit Recipe <span class="label label-default">ID <?php echo $category['idcategory']; ?></span></h3>
</div>

<div class="panel-body">
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group">

   <input type="hidden" value="<?php echo $category['idcategory']; ?>" name="idcategory">
   <label class="control-label">Name</label>
   <input type="text" maxlength="35" value="<?php echo $category['cat_name']; ?>" placeholder="" name="cat_name" class="form-control" required="">

   <label class="control-label">Summary</label>
   <textarea type="text" maxlength="250" value="" rows="4" placeholder="" class="form-control" name="summary" required=""><?php echo $category['summary']; ?></textarea>

   <label class="control-label">Thumbnail: <a href="<?php echo SITE_URL ?>/images/<?php echo $category['thumbnail']; ?>" data-lightbox="image-1"><?php echo $category['thumbnail']; ?></a></label>
   <input name="thumbnail" class="input-file" type="file">
   <input type="hidden" value="<?php echo $category['thumbnail']; ?>" name="thumbnail_save">
   <span class="text-danger">Recommended size: <b>800 x 350 Pixels</b> </span>

   <div class="action-button">
   <input type="submit" name="update" value="Update" class="btn btn-embossed btn-primary">
   <a onclick="alertdelete();">
   <input name="trash" value="Delete" class="btn btn-embossed btn-danger" style="width: 80px;"></a>
    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/delete_category.php?id=<?php echo $category['idcategory']; ?>" });}
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
</div>
