<?php 
session_start();
if( isset($_SESSION["login"]) ) {
  include 'headermember.php'; 
}
else{
  include 'header.php'; 
}
?>

<div class="container">
<h2>Info Kost</h2>
<div class="row">
  <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/kost 1.jpg" class="img-responsive"><div class="info"><h3>ARB'EL Kost Eksklusif Putra - Jakal</h3><p> Jl. Candiwinangun No. 23 RT04/RW12, Candi Winangun, Sardonoharjo, Kec. Sleman, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581 <br></p> <br> FULL BOOKED </div></div></div>
  <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/kost 2.jpg" class="img-responsive"><div class="info"><h3>ARB'EL Kost Eksklusif Putri - Seturan</h3><br><p> Jl. Raya Seturan No.10 A, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281 </p><a href="kostputri.php" class="btn-lg btn-default">Lihat</a></div></div></div>
  <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/kost 3.jpg" class="img-responsive"><div class="info"><h3>ARB'EL Kost Eksklusif Putra - Bantul</h3><p> Ngebel RT.01, Jl. Geblagan, Geblagan, Tamantirto, Kec. Kasihan, Bantul, Daerah Istimewa Yogyakarta 55184 <br><br></p> <br> FULL BOOKED </div></div></div>
  <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/kost 4.jpg" class="img-responsive"><div class="info"><h3>ARB'EL Kost Eksklusif Putri - Gejayan</h3><p> Jl. Gejayan Pelem Kecut, Karang Gayam, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281 <br><br></p> <br> FULL BOOKED </div></div></div>
</div>
</div>

<?php include 'footer.php';?>