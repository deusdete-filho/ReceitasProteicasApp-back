<nav class="navbar-inverse navbar-embossed">
<div class="container">
<a class="navbar-brand" href="<?php echo SITE_URL; ?>">Soillona Backend</a>
<form name="searching" action="<?php echo SITE_URL; ?>/search" method="GET" class="navbar-form navbar-left" role="search">
<div class="form-group">
<div class="input-group">
<input class="form-control" name="searching" id="navbarInput-01" type="search" placeholder="Search recipes...">
<span class="input-group-btn"><button type="submit" class="btn"><span class="fui-search"></span></button>
</span>
</div>
</div>
</form>
<div class="navbar-right">
<p class="navbar-text">Signed in as <b><?php echo $_SESSION['username'] ?></b></p>
<a type="button" class="btn btn-embossed btn-default navbar-btn btn-sm" href="<?php echo SITE_URL ?>/logout">Sign out</a>
</div>
</div>
</nav>
<div class="all-content">