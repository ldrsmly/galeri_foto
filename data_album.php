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

  <title>DATA ALBUM</title>


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
	 <div class="row">
	  <div class="col-md-12">
			<form method="GET" action="data_album.php" style="text-align: center;">
			<h4>
		DATA ALBUM
	    </h4>
				<br><br>
				<label>Kata Pencarian : </label>
				<input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) {echo $_GET['kata_cari']; } ?>" placeholder="NamaAlbum" />
				<button type="submit">Cari</button>
				<br>
			</form>
			<br>
	<table id="examplel" class="table table-bordered table-striped" border=1 align="center" width="60%">
	 <thead align="center">
		<tr>
			  <th>AlbumID </th>
			  <th>NamaAlbum</th>
			  <th>Deskripsi</th>
			  <th>TanggalDibuat</th>
			  <th>UserID </th>
			  <th  colspan="3">Aksi</th>
		</tr>
	</thead>
	<tbody align="cente">
		<?php
		include('koneksi.php');
		if(isset($_GET['kata_cari'])) {
		$kata_cari = $_GET['kata_cari'];
		$query = "SELECT * FROM album WHERE NamaAlbum like '%".$kata_cari."%' ORDER BY UserID ASC";
		} else {
		$query = "SELECT * FROM album ORDER BY UserID ASC";
		}
			
		$result = mysqli_query($koneksi, $query);
			
		if(!$result) {
		die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
		}
		while ($data = mysqli_fetch_assoc($result)) {
		?>
		<tr>
			<td><?php echo $data['AlbumID']; ?></td>
				<td><?php echo $data['NamaAlbum']; ?></td>
				<td><?php echo $data['Deskripsi']; ?></td>
				<td><?php echo $data['TanggalDibuat']; ?></td>
				<td><?php echo $data['UserID']; ?></td>
				<td><?php echo '
				  <a href="delete_data_album.php?AlbumID='.$data['AlbumID'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
				  ';?>
				</td>
			<td>
				<?php
				if ($data['Konfirmasi'] == 1) { ?>
					<span class="badge bg-warning">Belum di Konfirmasi</span>
				<?php } else { ?>
					<span class="badge bg-success">Sudah di Konfirmasi</span>
				<?php } ?>
			</td>
			<td>
			<?php
				if($data['Konfirmasi']==1){?>
				<form action="konfirmasi_album.php" method="POST">
					<input type="hidden" name="AlbumID" value="<?php echo $data['AlbumID']; ?>">
					<input type="hidden" name="Konfirmasi" value="2">
					<button class="btn btn-sm btn-primary">Konfirmasi</button>
				</form>
				<?php } else {?>
				<span class="">-</span>
				<?php } ?>
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
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">2024 - SMLY</a>
      </p>
    </div>
  </footer>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>


</body>

</html>