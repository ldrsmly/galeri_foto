<?php
	include('koneksi.php');
	$id_foto		=	$_POST['id_foto'];
	$id_user		=	$_POST['id_user'];
	$tanggal_like	=	date('Y-m-d');
	
	$sql = mysqli_query ($koneksi, "INSERT INTO tb_likefoto (id, id_foto, id_user, tanggal_like) VALUES ('','$id_foto', '$id_user', '$tanggal_like')") or die(mysqli_error($koneksi)); //GANTI
	
		if($sql) //jika data berhasil ditambahkan
			{
			echo '<script>alert("Berhasil menambahkan like."); document.location="foto.php";</script>';
			}
			else //jika tidak berhasil ditambahkan ke database
			{
			echo '<script>alert("Gagal melakukan like"); document.location="like.php";</script>';
			}
?>	