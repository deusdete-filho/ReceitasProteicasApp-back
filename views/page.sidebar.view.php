<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Recently added recipes</h3></div>
<div class="panel-body">
<ul class="list-group">
<?php foreach($recents as $recent): ?>
	<a href="<?php echo SITE_URL ?>/edit_recipe.php?id=<?php echo $recent['id']; ?>">
  <li class="list-group-item"><i class="glyphicon glyphicon-plus"></i> <?php echo $recent['title']; ?> <span>ID <?php echo $recent['id']; ?></span></li></a>
<?php endforeach; ?>
</ul></div></div>