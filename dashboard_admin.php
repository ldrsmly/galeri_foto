<?php
	include 'koneksi.php';
	session_start();
	if(!isset($_SESSION['UserID'])){
		echo'<script>alert("Login terlebih dahulu");
		document.location="login.php";</script>';
	}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>DASHBOARD ADMIN</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span><img src="images/gambar08.png"width="50px"></img></span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
			<li class="nav-item">
                <a class="nav-link" href="dashboard_admin.php">DASHBOARD</a>
             </li>
			 <li class="nav-item active">
                <a class="nav-link" href="data_user.php">DATA USER</a>
            </li>
			 <li class="nav-item">
                <a class="nav-link" href="data_album.php">DATA ALBUM</a>
             </li>
			 <li class="nav-item">
                <a class="nav-link" href="data_foto.php">DATA FOTO</a>
             </li>
			 <li class="nav-item active">
                <a class="nav-link" href="data_like.php">DATA LIKE</a>
            </li>
			<li class="nav-item active">
                <a class="nav-link" href="data_komentar.php">DATA KOMENTAR</a>
            </li>
			 <li class="nav-item active">
				<a class="nav-link" href="logout.php">Logout</a>
             </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
  </div> 
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>Selamat Datang Di Galeri Foto,</h2>
		<br>
		  <?php
		  require_once 'koneksi.php';
		  $query = "SELECT * FROM user WHERE UserID='$_SESSION[UserID]'";
		  $result = mysqli_query($koneksi, $query);
		  while($data = mysqli_fetch_assoc($result) )
		  {
		  ?>
		  <h4><i><?php echo $data['Username']; ?></i></h4>
		  <?php
		  }
		  ?> 
		<img src="images/gambar08.png"width="200px"></img>
		</div>
	  </div>
  </section>
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">SMLY</a>
      </p>
    </div>
  </footer>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>


</body>

</html>