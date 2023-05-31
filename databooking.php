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
                <center><h1>DATA BOOKING </h1></center>  
                <table class="table text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Booking</th>
                            <th>Nama Lengkap</th>
                            <th>No HP</th>
                            <th>Nomor Kamar</th>
                            <th>Tanggal Booking</th>
                            <th>Tanggal Huni</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <?php include "fungsi.php";
                        $query = mysqli_query($conn, "SELECT * FROM booking INNER JOIN kamarputri ON booking.idkamar = kamarputri.idkamar INNER JOIN user ON booking.iduser = user.id");
                        while($data=mysqli_fetch_array($query)) 
                        {
                    ?>
                            <tr class="warning">
                                <td><?php echo $data['idbooking'];?></td>
                                <td><?php echo $data['namalengkap'];?></td>
                                <td><?php echo $data['nohp'];?></td>
                                <td><?php echo $data['nomorkamar'];?></td>
                                <td><?php echo $data['tanggalbooking'];?></td>
                                <td><?php echo $data['tanggalhuni'];?></td>
                                <td>
                                    <form action="hapus.php" method="post">
                                        <input type="hidden" name="idbooking" value="<?= $data['idbooking']; ?>">
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
