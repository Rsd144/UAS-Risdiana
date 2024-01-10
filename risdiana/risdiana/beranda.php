<?php
// file ini adalah bagian dari formulir pendaftaran buku

include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>psb online</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Quicksand:wght@500&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
</head>
<body>

	<!-- bagian header -->
	<header>
		<h1><a href="beranda.php">Admin Pendaftaran Beasiswa</a></h1>
		<ul>
			<li><a href="login.php">Beranda</li>
			<li><a href="data-peserta.php">Data Peserta</li>
			<li><a href="login.php">Keluar</li>
		</ul>
	</header>

	<!-- bagian content -->
<!-- bagian content -->
<section class="content">
    <h2>Beranda</h2>
    <div class="box">
        <?php
        // Pastikan variabel sesi id_admin sudah di-set saat login
        if(isset($_SESSION['id_admin'])) {
            $id_admin = $_SESSION['id_admin'];
            
            // Query untuk mendapatkan data admin dari database
            $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '$id_admin'");
            
            // Cek apakah data admin ditemukan
            if(mysqli_num_rows($query) > 0) {
                $a = mysqli_fetch_object($query);
                $_SESSION['nm_admin'] = $a->nm_admin;
                echo '<h3>'.$_SESSION['nm_admin'].' Selamat Datang di PBS Online.</h3>';
            } else {
                // Handle jika data admin tidak ditemukan
                echo 'Data admin tidak ditemukan.';
            }
        } else {
            // Handle jika variabel sesi id_admin tidak di-set
            echo 'Sesi id_admin tidak di-set.';
        }
        ?>
    </div>
</section>


</body>
</html>