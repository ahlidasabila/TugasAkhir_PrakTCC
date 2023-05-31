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
if (isset($_POST["ubah"])) {
	if(ubah($_POST) > 0) {
		echo "<script>
			alert('Data berhasil diubah!');
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
			<h1>EDIT DATA KAMAR </h1>
		</div> 
        <?php
            $idkamar = $_GET['idkamar'];
            $db = mysqli_query($conn," SELECT * FROM kamarputri WHERE idkamar='$idkamar'");
            while($hasil = mysqli_fetch_array($db))
            {
		?> 
				<form action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="fotolama" value="<?php echo $hasil['foto'];?>">
					
					<div class="form-group">
						<label>Nomor Kamar</label><br>
						<input type="text" name="nomorkamar" value="<?php echo $hasil['nomorkamar'];?>">
					</div>
					<div class="form-group">
						<label>Fasilitas</label><br>
						<input type="textarea" name="fasilitas" value="<?php echo $hasil['fasilitas'];?>">
					</div>
					<div class="form-group">
						<label>Status</label><br>
						<select name="status" >
							<option><?php echo $hasil['status']?></option>
							<option style="color:black" value="Tersedia">Tersedia</option>
							<option style="color:black" value="Tidak Tersedia">Tidak Tersedia</option>											
						</select>
					</div>
					<div class="form-group">
						<label>Biaya Sewa</label><br>
						<input type="text" name="harga" value="<?php echo $hasil['harga'];?>">
					</div>
					<div class="form-group">
                        <label>Foto Kamar</label>
                        <img style="width:100px; height:auto;"  src="images/upload/<?php echo $hasil['foto']; ?>">
						<input type="file" name="foto" id="foto" class="form-control bg-light" placeholder="Foto Kamar" >
					</div>
					<input type="hidden" name="idkamar" id="idkamar" value="<?php echo $hasil['idkamar'];?>">
					<div class="form-group">
						<input type="submit" name="ubah" id="ubah" value="Ubah" class="btn btn-primary" >
						<a href="datakamar.php" class="btn btn-danger">Batal</a>
					</div>								
                </form>
        <?php } ?>
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