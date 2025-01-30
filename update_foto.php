<?php
	include('koneksi.php');
	$FotoID 		= $_POST['FotoID'];
	$JudulFoto 		= $_POST['JudulFoto'];
	$DeskripsiFoto 	= $_POST['DeskripsiFoto'];
	$TanggalUnggah 	= $_POST['TanggalUnggah'];
	$LokasiFile 	= $_POST['LokasiFile'];
	$AlbumID 		= $_POST['AlbumID'];
	$UserID 		= $_POST['UserID'];
	
	$sql = mysqli_query($koneksi, "UPDATE foto SET FotoID='$FotoID', JudulFoto='$JudulFoto', DeskripsiFoto='$DeskripsiFoto', TanggalUnggah='$TanggalUnggah', LokasiFile='$LokasiFile', AlbumID='$AlbumID', UserID='$UserID' WHERE FotoID='$FotoID'") or die(mysqli_error($koneksi)); 
	
	if($sql) //berhasil
	{
		echo '<script>alert("Berhasil menyimpan data."); document.location="foto.php";</script>';
	}
		else //gagal
	{
		echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
	}
?>