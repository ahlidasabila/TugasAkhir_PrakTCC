<?php 
session_start();
if (!isset($_SESSION["login"]))
{
	echo "<script>
	alert('Login Terlebih Dahulu!');
	document.location.href = 'login.php';
	</script>";
	exit;
}
include 'headermember.php'?>
<!doctype html>
<html lang="en">

<head></head>
<body>

<div class="allcontain">
	<div class="feturedsection">
		<h2 class="text-center">Status Pembayaran</h2>
	</div>
</div>
<table class="table table-striped table-bordered">
    <thead>
        <tr>                   
            <th>Nama Lengkap</th>
            <th>Nomor Kamar</th>
            <th>Tanggal Selesai</th>
            <th>Status</th>
        </tr>
    </thead>
    <?php include "fungsi.php";
        $query = mysqli_query($conn, "SELECT * FROM bayar INNER JOIN kamarputri ON bayar.idkamar = kamarputri.idkamar INNER JOIN user ON bayar.iduser = user.id");
        while($data=mysqli_fetch_array($query)) 
        {
    ?>
            <tr class="warning">
                <td><?php echo $data['namalengkap'];?></td>
                <td><?php echo $data['nomorkamar'];?></td>                                   
                <td><?php echo $data['tanggalselesai'];?></td>
                <td><?php echo $data['statuss'];?></td>                                   
    <?php }?>                                                                    
            </tr>                               
</table>
 </div>
 </div>
 </div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

<?php include 'footer.php'; ?>