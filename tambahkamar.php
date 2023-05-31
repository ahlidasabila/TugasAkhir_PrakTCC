<?php 
session_start();
if (!isset($_SESSION["login1"]))
{
	echo "<script>
	alert('Login Terlebih Dahulu!');
	document.location.href = 'loginadmin.php';
	</script>";
	exit;
}
include 'headeradmin.php';
require 'fungsi.php';
if (isset($_POST["tambah"])) {
	if(tambah($_POST) > 0) {
		echo "<script>
			alert('Data berhasil ditambahkan!');
			document.location.href = 'datakamar.php';
			</script>";	
	}
	else {
		echo "<script>
			alert('error!');
			</script>";
		echo mysqli_error($conn);
	}	
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">	
</head>

<body>
<div id="content" class="p-5 p-md-5 pt-5">
	<div class="row">
		<div class="col-lg-12">
			<h1>TAMBAH DATA KAMAR </h1>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nomor Kamar</label>
				<input type="text" name="nomorkamar" id="nomorkamar" class="form-control bg-light" placeholder="Nomor Kamar" required>
			</div>
			<div class="form-group">
				<label>Fasilitas</label><br>
				<textarea name="fasilitas" id="fasilitas" cols="50" rows="5" placeholder="Fasilitas" required></textarea>
			</div>
			<div class="form-group">
				<label>Status</label>
				<select name="status" required>
					<option value="Tersedia" selected>Tersedia</option>
					<option value="Tidak Tersedia">Tidak Tersedia</option>
				</select>
			</div>
			<div class="form-group"><br>
				<label>Biaya Sewa</label>
				<input type="text" name="harga" id="harga" class="form-control bg-light" placeholder="Biaya Sewa" required>
			</div>
			<div class="form-group">
				<label>Foto Kamar</label>
				<input type="file" name="foto" id="foto" class="form-control bg-light" placeholder="Foto Kamar" required>
			</div>
			<input type="hidden" name="idkamar" id="idkamar">
			<div class="form-group">
				<input type="submit" name="tambah" id="tambah" value="Tambah" class="btn btn-primary" >
				<a href="datakamar.php" class="btn btn-danger">Batal</a>
			</div>					
		</form>
	</div>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</div>
</body>
</html>

<?php include 'footer.php';?>