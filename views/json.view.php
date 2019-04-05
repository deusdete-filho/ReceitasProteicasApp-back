<div class="container-fluid" style="margin-top: 15px;">
<div class="row row-top">
<div class="col-md-10">

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

<div class="row-table">
<table class="ui single line table" width="100%" border="0" cellpadding="0" cellspacing="0">
<thead>
<tr>
<th>Tables</th>
<th style="text-align: center;">Download</th>
</tr>
</thead>
  <tr>
    <td width="90%">Recipes <span class="required">Required</span></td>
    <td width="10%" style="text-align: center;">
      <?php echo $success_recipes; ?>   
      <?php if( !empty($errors_recipes)): ?>
      <?php echo $errors_recipes; ?>   
      <?php endif; ?>
    </td>
  </tr>

  <tr>
    <td width="90%">Categories <span class="required">Required</span></td>
    <td width="10%" style="text-align: center;">
    	<?php echo $success_categories; ?>   
      <?php if( !empty($errors_categories)): ?>
      <?php echo $errors_categories; ?>   
      <?php endif; ?>
    </td>
  </tr>

  <tr>
    <td width="90%">Chefs <span class="required">Required</span></td>
    <td width="10%" style="text-align: center;">
    	<?php echo $success_chefs; ?>   
      <?php if( !empty($errors_chefs)): ?>
      <?php echo $errors_chefs; ?>   
      <?php endif; ?>
    </td>
  </tr>

</table>
</div>      
</div>
<div class="col-md-2">   
<?php require'sidebar.view.php'; ?>  
</div>
</div>
</div>