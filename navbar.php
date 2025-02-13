<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WinFoodEats</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap/fonts/glyphicons-halflings-regular.woff">
  <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <!-- navbar start -->
    <nav class="navbar navbar-inverse">
		<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle Nav</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">WinFoodEats</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
			<li class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
				<a href="index.php">HOME <span class="sr-only">(current)</span></a>
			</li>
			<li class="<?php echo ($current_page == 'menu.php') ? 'active' : ''; ?>">
				<a href="menu.php">Menu</a>
			</li>
			<li class="<?php echo ($current_page == 'makanan.php') ? 'active' : ''; ?>">
				<a href="makanan.php">Makanan</a>
			</li>
			<li class="<?php echo ($current_page == 'minuman.php') ? 'active' : ''; ?>">
				<a href="minuman.php">Minuman</a>
			</li>
			<li class="<?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">
				<a href="about.php">About</a>
			</li>
			<li class="<?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">
				<a href="contact.php">Contact</a>
			</li>
			</ul>
			<form class="navbar-form navbar-left" action="menu.php" method="GET">
				<div class="form-group">
					<input type="text" name="search" class="form-control" placeholder="Cari Menu" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
				</div>
				<button type="submit" class="btn btn-default">Cari</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span> User <span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="admin/login.php">Login</a></li>
				
				</ul>
			</li>
			</ul>
		</div>
		</div>
	</nav>	
<!-- navbar end  -->