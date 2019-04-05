<div class="container-fluid">
	<div class="row">
	
<div class="col-md-1">
    </div>
    <div class="col-md-7">
        
        
        <div class="page-header">
  <h3><?php echo $recipe['title']; ?></h3>
  <p class="date"><?php echo 'By ' . $recipe['author']; ?> - <?php echo 'Updated: ' . $recipe['date']; ?></p>
		</div>
<nav aria-label="...">
  <ul class="pager" style="text-align:left;">
    <li><a><?php echo $recipe['name']; ?></a></li>
    <li><a><?php echo $recipe['servings']; ?> Servings</a></li>
    <li><a><?php echo $recipe['dificult']; ?></a></li>
    <li><a><?php echo $recipe['time']; ?> Min</a></li>
  </ul>
</nav>
      
      <div class="thumbnail">
      <a href="<?php echo SITE_URL ?>/images/<?php echo $recipe['image']; ?>" data-lightbox="image">
      <img src="<?php echo SITE_URL ?>/images/<?php echo $recipe['image']; ?>" alt="">
            </a>

      <div class="caption">

        <p><?php echo $recipe['description']; ?></p>

        <h4><i class="glyphicon glyphicon-list-alt"></i> Ingredients</h4>
        <p><?php echo $recipe['ingredients']; ?></p>

        <h4><i class="glyphicon glyphicon-cutlery"></i> Preparation</h4>
        <p><?php echo $recipe['preparation']; ?></p>

        <h4><i class="glyphicon glyphicon-heart-empty"></i> Nutritional Information</h4>
        <p><?php echo $recipe['nutritional']; ?></p>

      </div>
    </div>
        
        
		</div>

    <div class="col-md-3">
    
    
<?php require'sidebar.view.php'; ?>
    
    </div>

	</div>
</div>