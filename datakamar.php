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
include 'headeradmin.php'
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
<div id="content" class="p-4 p-md-5 pt-5">
    <div  class="welcome-message">
        <div class="wrap-info">
            <div class="information">
                <center><h1>Data Kamar Kost Putri Seturan</h1></center>
                <div class="col-md-12 text-right">
                    <a href="tambahkamar.php" class="btn btn-warning" style="margin-top:20px; margin-bottom:20px"><i></i>Tambah Data</a>
                </div>	  
                <table class="table text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Kamar</th>
                            <th>Nomor Kamar</th>
                            <th>Fasilitas</th>
                            <th>Status</th>
                            <th>Harga</th>
                            <th>Foto</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <?php include "fungsi.php";
                        $SQL = mysqli_query($conn, "SELECT * FROM kamarputri");
                         while($data=mysqli_fetch_array($SQL)) 
                        {
                    ?>
                            <tr class="warning">
                                <td><?php echo $data['idkamar'];?></td>
                                <td><?php echo $data['nomorkamar'];?></td>
                                <td><?php echo $data['fasilitas'];?></td>
                                <td><?php echo $data['status'];?></td>
                                <td><?php echo $data['harga'];?></td>
                                <td><img style="width:100px; height:auto;" src="images/upload/<?php echo $data['foto']; ?>"></td>
                                <td >
                                    <a class="btn btn-primary mb-2" href=editkamar.php?idkamar=<?php echo $data['idkamar']; ?>>Edit</a>
                                    <form action="hapus.php" method="post"> 
                                        <input type="hidden" name="idkamar" value="<?= $data['idkamar']; ?>">
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                    </form>
                                </td>
                    <?php }?>
                            </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

<?php include 'footer.php'; ?>
