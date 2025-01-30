<?php
	include 'koneksi.php';
	session_start();
	if(!isset($_SESSION['Username'])){
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
  <title>DASHBOARD ALBUM</title>
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
        </nav>
      </div>
    </header>
  </div>
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>ALBUM</h2>
      </div>
	   <div class="row">
        <div class="col-md-12">
		  <form method="GET" action="album.php" style="text-align: center;">
				<br><br>
				<label>Kata Pencarian : </label>
				<input type="text" name="kata_cari" class="form-control" placeholder="NamaAlbum" value="<?php if(isset($_GET['kata_cari'])) {echo $_GET['kata_cari']; } ?>" />
				<button type="submit">Cari</button>
				<br>
			</form>
		  <br>
		  <a href="tambah_album.php">+ Tambah Album</a>
		  <table id="example1" class="table table-bordered table-striped" border=1 align="center" width="60%">
		  <thead align="center">
			<tr>
			  <th>AlbumID </th>
			  <th>NamaAlbum</th>
			  <th>Deskripsi</th>
			  <th>TanggalDibuat</th>
			  <th>UserID </th>
			  <th>Aksi</th>
			</tr>
		  </thead>
		  <tbody  align="center">
			<?php
				include('koneksi.php');
				if(isset($_GET['kata_cari'])) {
				$kata_cari = $_GET['kata_cari'];
				$query = "SELECT * FROM album WHERE NamaAlbum like '%".$kata_cari."%' ORDER BY AlbumID ASC";
				} else {
				$query = "SELECT * FROM album WHERE UserID='$_SESSION[UserID]' ORDER BY AlbumID ASC";
				}
				$result = mysqli_query($koneksi, $query);
				if(!$result) {
				die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
				}
				$no = 1;
				while ($data = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $data['AlbumID']; ?></td>
				<td><?php echo $data['NamaAlbum']; ?></td>
				<td><?php echo $data['Deskripsi']; ?></td>
				<td><?php echo $data['TanggalDibuat']; ?></td>
				<td><?php echo $data['UserID']; ?></td>
				<td><?php echo '
					<a href="edit_album.php?AlbumID='.$data['AlbumID'].'" class="badge badge-warning">Edit</a>
					<a href="delete_album.php?AlbumID='.$data['AlbumID'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
					';?>
				</td>
			</tr>
			<?php
			  }
			?>
		  </tbody>
		  </table>		  
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