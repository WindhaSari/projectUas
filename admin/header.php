<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>WinFoodEats</title>
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../DataTable/datatables.min.css" rel="stylesheet" />
  <script src="../bootstrap/plugins/ckeditor/ckeditor.js"></script>
  <style>
    body {
      padding-top: 60px;
    }
  </style>
</head>

<body>
  <!-- Awal script Navbar -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle Nav</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">WinFoodEats</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
            <a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard
              <span class="sr-only">(current)</span></a>
          </li>
          <li class="<?php echo ($current_page == 'data-menu.php') ? 'active' : ''; ?>">
            <a href="data-menu.php"><span class="glyphicon glyphicon-user"></span>Data Menu</a>
          </li>
          <li class="<?php echo ($current_page == 'tambah-produk.php') ? 'active' : ''; ?>">
            <a href="tambah-produk.php"><span class="glyphicon glyphicon-user"></span>Tambah Produk</a>
          </li>
          <li class="<?php echo ($current_page == 'blog.php') ? 'active' : ''; ?>">
            <a href="blog.php"><span class="glyphicon glyphicon-user"></span>Blog</a>
          </li>
          <li class="<?php echo ($current_page == 'tampil-user.php') ? 'active' : ''; ?>">
            <a href="tampil-user.php"><span class="glyphicon glyphicon-registration-mark"></span>User</a>
          </li>
          <li class="<?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">
            <a href="contact.php"><span class="glyphicon glyphicon-comment"></span>Contact</a>
          </li>

          <li class="dropdown">
            <a href="tampil-user.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
              aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Hallo (
              <?php echo $_SESSION['username'];?> )<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="profile.php"><span class="glyphicon glyphicon-book"></span> Profile</a></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-lock"></span> Logout</a></li>
            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Akhir script Navbar -->
</body>

</html>