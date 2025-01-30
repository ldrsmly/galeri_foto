<?php
	include('koneksi.php');
	$AlbumID 		= $_POST['AlbumID'];
	$NamaAlbum 		= $_POST['NamaAlbum'];
	$Deskripsi 		= $_POST['Deskripsi'];
	$TanggalDibuat 	= $_POST['TanggalDibuat'];
	$UserID 		= $_POST['UserID'];
	$Konfirmasi 	= $_POST['Konfirmasi'];
	
	$sql = mysqli_query($koneksi, "UPDATE album SET AlbumID='$AlbumID', NamaAlbum='$NamaAlbum', Deskripsi='$Deskripsi', TanggalDibuat='$TanggalDibuat', UserID='$UserID', Konfirmasi='1' WHERE AlbumID='$AlbumID'") or die(mysqli_error($koneksi)); 
	
	if($sql) //berhasil
	{
		echo '<script>alert("Berhasil menyimpan data."); document.location="album.php";</script>';
	}
		else //gagal
	{
		echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
	}
?>