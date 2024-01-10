<?php
// file ini adalah bagian dari formulir pendaftaran buku

include 'koneksi.php';

if (isset($_POST['submit'])) {
    // ambil 1 id terbesar di kolom id_pendaftaran, lalu ambil 5 karakter aja dari sebelah kanan
    $getMaxId = mysqli_query($conn, "SELECT MAX(RIGHT(id_pendaftaran, 5)) AS id FROM tb_buku");
    $data = mysqli_fetch_assoc($getMaxId);
    $nextId = $data['id'] + 1;

    // ambil data dari formulir
    $buku = $_POST['buku'];
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $isbn = $_POST['isbn'];

    // buat id baru dengan format 'BKU00001'
    $newId = 'BKU' . str_pad($nextId, 5, '0', STR_PAD_LEFT);

    // query untuk menyimpan data buku ke database
    $insertQuery = "INSERT INTO tb_buku (id_pendaftaran, buku, judul_buku, penulis, tahun_terbit, isbn) VALUES ('$newId', '$buku', '$judul_buku', '$penulis', '$tahun_terbit', '$isbn')";

    // eksekusi query
    $result = mysqli_query($conn, $insertQuery);

    if ($result) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daftar Buku</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Quicksand:wght@500&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
</head>
<body>

	<!-- bagian box formulir -->
	<section class="box-formulir">
		<h2>Formulir Pendaftaran</h2>

		<!-- bagian form -->
		<form action="" method="post">
			
			<div class="box">
				<table border="0" class="table-form">
					<tr>
						<td>Buku</td>
						<td>:</td>
						<td>
							<input type="text" name="buku" class="input-control">
						</td>
					</tr>
					<tr>
						<td>Judul Buku</td>
						<td>:</td>
						<td>
							<input type="text" name="judul_buku" class="input-control">
						</td>
					</tr>
					<tr>
						<td>Penulis</td>
						<td>:</td>
						<td>
							<input type="text" name="penulis" class="input-control">
						</td>
					</tr>
					<tr>
						<td>Tahun Terbit</td>
						<td>:</td>
						<td>
							<input type="text" name="tahun_terbit" class="input-control">
						</td>
					</tr>
					<tr>
						<td>ISBN</td>
						<td>:</td>
						<td>
							<input type="text" name="isbn" class="input-control">
						</td>
					</tr>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>
							<input type="submit" name="submit" class="btn-daftar"value="OKE">
						</td>
					</tr>

				</table>
			</div>
		</form>
	</section>

</body>
</html>