<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10">
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">Categories <span class="label label-default">Total <?php echo $categories_total; ?></span></h3>
</div>

<div class="panel-body" style="padding: 10px 5px;">
<?php foreach($categories as $category): ?>
	<div class="col-md-3">

    <div class="card" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.6)), url('images/<?php echo $category['thumbnail']; ?>');">
  <div class="card-id">ID <?php echo $category['idcategory']; ?></div>
  <div class="card-description">
    <h2><?php echo $category['cat_name']; ?></h2>
    <p>
    <a href="<?php echo SITE_URL ?>/edit_category.php?id=<?php echo $category['idcategory']; ?>">Edit</a> · 
    <a onclick="alertdelete();">Delete</a>
    
    </p>
  </div>
  </div>
  </div>
<?php endforeach; ?>
<?php if( !empty($errors)): ?>
<?php echo $errors; ?>    
<?php endif; ?>
<script type="text/javascript">
  function alertdelete() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/delete_category.php?id=<?php echo $category['idcategory']; ?>" });}
  </script>
</div>
</div>
<!-- <?php require 'pagination.php'; ?>   -->        
</div>
<div class="col-md-2">   
<?php require'sidebar.view.php'; ?>  
</div>
</div>
</div>