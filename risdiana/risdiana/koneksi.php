<?php
	// membuat koneksi database
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'daftar_buku';

	$conn = mysqli_connect($host, $user, $pass, $db);

	if(!$conn){
		echo 'Error :'.mysql_connect_error($conn);
	} else {
		echo "Connected successfully";
	}
?>