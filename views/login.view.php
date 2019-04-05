<div class="container-fluid" style="margin-top:25px">
	<div class="row">
	
	
		<div class="col-md-4">
		</div>
		
		
<div class="col-md-4 animated fadeIn"> <!-- BLOCK INPUT  -->
		
<div class="panel panel-default">


<div class="panel-heading">
    <h3 class="panel-title">Sign In</h3>
</div>


<div class="panel-body">

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="login">    
<div class="input-group">
   <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
   <input type="text" class="form-control" name="username" placeholder="Username">
</div>
<br/>
<div class="input-group">   
   <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
   <input type="password" class="form-control" name="password" placeholder="Password">  
</div>
<br/>

<button type="submit" class="btn btn-default" onclick="login.submit()">Enter</button>

<?php if( !empty($errors)): ?>

<div class="alert alert-danger animated fadeIn" role="alert" style="margin-top:15px;">
    
    <?php echo $errors; ?>
    
</div>
<?php endif; ?>

</form>  
</div>

</div>

</div><!-- FINISH BLOCK INPUT  -->
		
		
		<div class="col-md-4">
		</div>
		
		
	</div>
</div>