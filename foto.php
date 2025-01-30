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
  <title>FOTO</title>
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
  </div>

  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>FOTO</h2>
		<br>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form method="GET" action="foto.php" style="text-align: center;">
				<br><br>
				<label>Kata Pencarian : </label>
				<input type="text" name="kata_cari" class="form-control" placeholder="JudulFoto	" value="<?php if(isset($_GET['kata_cari'])) {echo $_GET['kata_cari']; } ?>" />
				<button type="submit">Cari</button>
				<br>
			</form>
		<a href="tambah_foto.php">+ Tambah Foto</a>
			<br>
			<div class="container-fluid">
				<div class="services_section_2">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<?php
									include('koneksi.php');
									if(isset($_GET['kata_cari'])) {
										$kata_cari = $_GET['kata_cari'];
										$query = "SELECT * FROM foto WHERE JudulFoto like '%".$kata_cari."%' ORDER BY FotoID ASC";
									} else {
									$query = "SELECT * FROM foto WHERE UserID='$_SESSION[UserID]' ORDER BY FotoID ASC";
									}
									$result = mysqli_query($koneksi, $query);
									if(!$result) {
									die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
									}
									$no = 1;
									while ($data = mysqli_fetch_assoc($result)) {
									?>
									<div class="col-md-4" align="center">
									  <div class="card card-widget">
										<div class="card-body">
										  <span class="description"><?=$data['FotoID']?></span>
										  <br>
										  <?=$data['JudulFoto']?>
										  <br>
										  <?=$data['DeskripsiFoto']?>
										  <br>
										  <?=$data['TanggalUnggah']?>
										  <br>
										  <img class="d-block w-100" src="images/<?=$data['LokasiFile']?>" width="200px">
										  <br>
										  <?=$data['AlbumID']?>
										  <br>
										  <?=$data['UserID']?>
										  <br>
										  <td><?php echo '
										  <a href="edit_foto.php?FotoID='.$data['FotoID'].'" class="badge btn-info"><i class="">Edit</i></a>
										  <a href="delete_foto.php?FotoID='.$data['FotoID'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="">Delete</i></a>
										  ';?>
										  </td>
										</div>
										
									  </div>
									</div>
									<?php $no++; } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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