<?php
	include 'koneksi.php';
	session_start();

	if(!isset($_SESSION['UserID'])){
		echo '<script>alert("Login terlebih dahulu!"); 
		document.location="login.php";</script>';
	}
?>	
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>EDIT ALBUM</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
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
                <a class="nav-link" href="dashboard_pengguna.php">DASHBOARD</a>
             </li>
			 <li class="nav-item">
                <a class="nav-link" href="album.php">ALBUM</a>
             </li>
			 <li class="nav-item">
                <a class="nav-link" href="foto.php">FOTO</a>
             </li>
			 <li class="nav-item active">
				<a class="nav-link" href="logout.php">Logout</a>
             </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          EDIT ALBUM SAYA
        </h2>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <div class="form_container">
		  <?php
			include('koneksi.php');
			$AlbumID = $_GET['AlbumID'];
			$select = mysqli_query($koneksi, "SELECT * FROM album WHERE AlbumID='$AlbumID'" ) or die(mysqli_error($koneksi)); //GANTI
			$data = mysqli_fetch_assoc($select);
		  ?>
			<form action="update_album.php" method="post">
			  <div class="form-group has-feedbck">
				<label>AlbumID  :</label>
				<input type="text" name="AlbumID" class="form-control" placeholder="AlbumID" value="<?php echo $data['AlbumID']?>" readonly>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			  </div>
			  <div class="form-group has-feedback">
				<label>NamaAlbum :</label>
				<input type="text" name="NamaAlbum" class="form-control" placeholder="NamaAlbum" value="<?php echo $data['NamaAlbum']?>">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div> 
			<div class="form-group has-feedback">
				<label>Deskripsi :</label>
				<input type="text" name="Deskripsi" class="form-control" placeholder="Deskripsi" value="<?php echo $data['Deskripsi']?>">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div> 
			<div class="form-group has-feedback" hidden>
				<label>TanggalDibuat :</label>
				<input type="date" name="TanggalDibuat" class="form-control" placeholder="TanggalDibuat" value="<?php echo $data['TanggalDibuat']?>" readonly>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<label>UserID :</label>
				<?php
					include 'koneksi.php';
					$UserID=$_SESSION['UserID'];
					$sql=mysqli_query($koneksi, "select * from user where UserID='$UserID'");
					while($data=mysqli_fetch_array($sql)){
				?> 
				<input type="text" name="UserID" class="form-control" placeholder="UserID" value="<?=$data['UserID']?>" >
				<?php
				}
				?>
				<span class="glyphicon glyphicon-lock from-control-feedbck"></span>
			</div>
			  <div class="form-group has-feedbck" hidden>
				<label>Konfirmasi  :</label>
				<input type="text" name="Konfirmasi" class="form-control" placeholder="Konfirmasi" value="<?php echo $data['Konfirmasi']?>" readonly>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			  </div>
			  <div class="form-group has-feedback">
				<div class="col-xs-12">
				<button type="submit" name="register" class="btn btn-primary btn-block btn-flat">Simpan Perubahan</button>
				<button type="reset" name="hapus" class="btn btn-primary btn-block btn-flat">Hapus</button>
				</div>
			  </div>
			</form> 
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">SMLY</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>


</body>

</html>