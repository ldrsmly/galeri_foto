<?php
	$host="localhost";
	$user="root";
	$password="";
	$db="galeri_foto_fauzi";
	$koneksi = mysqli_connect($host,$user,$password,$db);
	if (!$koneksi)
	{
			die("koneksi gagal:".mysqli_connect_error());
	}
?>