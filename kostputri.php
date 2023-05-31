<?php 
session_start();
if( isset($_SESSION["login"]) ) {
  include 'headermember.php'; 
}
else {
  include 'header.php';
}
?>

<div class="container">
    <h2>ARB'EL Kost Eksklusif Putri - Seturan</h2>
    <div>
          <?php include "fungsi.php";
            $SQL = mysqli_query($conn, "SELECT * FROM `kamarputri`");
            if(isset($_SESSION['login'])) $iduser = $_SESSION['login'];
            else $iduser='';
            while($data=mysqli_fetch_assoc($SQL)) 
            {       
          ?>
            <div class="col-sm-6 wowload fadeInUp">
              <div class="rooms">
                <img src="images/upload/<?php echo $data['foto']; ?>" class="img-responsive">
                <div class="info">
                  <h3>Kamar <?php echo $data['nomorkamar']; ?> </h3>
                  <p>Fasilitas : <?php echo $data['fasilitas']; ?></p>
                  <p>Status : <?php echo $data['status']; ?> </p>
                  <h3>Rp.<?php echo $data['harga']; ?>/Tahun </h3>
                    <div style="display: flex;" >            

                    <?php if(isset($_SESSION['login']) AND $data['status']=='Tersedia'):?>
                        <form action="booking.php" method="POST">
                          <input type="hidden" name="kamar" value="<?php echo $data['idkamar'];?>">
                    <?php endif; ?>
                          <button type="submit" name="pesan" class="btn btn-primary" style="margin-left:3px"
                          <?php if(!isset($_SESSION['login']) OR $data['status']=='Tidak Tersedia'):?>
                          disabled
                          <?php endif; ?>
                          >Pesan</button>
                    <?php if(isset($_SESSION['login']) AND $data['status']=='Tersedia'):?>
                        </form>
                    <?php endif; ?>
                       <?php 
                          $found = false;
                          $SQL2 = mysqli_query($conn, "SELECT * FROM  `booking`");
                          while($booking = mysqli_fetch_assoc($SQL2)){
                            if($data['idkamar'] == $booking['idkamar']){
                              if($iduser == $booking['iduser']){
                                $found = true;
                              }
                            }
                          }
                          if($found){
                       ?>
                        <form action="bayar.php" method="POST">
                          <input type="hidden" name="kamar" value="<?php echo $data['idkamar'];?>">
                          <button type="submit" class="btn btn-success" style="margin-left:3px">Pembayaran</button>               
                        </form>
                        <form action="keluhan.php" method="POST">
                          <input type="hidden" name="kamar" value="<?php echo $data['idkamar'];?>">
                          <button type="submit" name="keluhan" class="btn btn-warning" style="margin-left:3px">Keluhan</button>
                        </form>
                        <?php }; ?>
                    </div>
                </div>
              </div>
            </div>
          <?php }?>
    </div>
</div>

<div class="container">
  <h2>Fasilitas Bersama </h2>
  <div class="row">
    <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/rooftop.jpeg" class="img-responsive"><div class="info"><h3>Rooftop Luas</h3><p> Dari atas rooftop ini, kamu bisa melihat pemandangan lingkungan di sekitar wilayah Yogyakarta. Bahkan, dapat memandang gedung-gedung pencakar langit khas kota Yogyakarta dari kejauhan.<br> Rooftop yang menggunakan kanopi, sehingga kamu tetap bisa nongkrong atau berkumpul santai, sendiri atau bersama anak kost lainnya, ketika sedang hujan.</p></div></div></div>
    <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/dapur.jpeg" class="img-responsive"><div class="info"><h3>Dapur Bersama</h3><p> Keuntungan utama kost dengan dapur dalam adalah mau sarapan, makan siang, makan malam, bahkan tengah malam sekalipun, bebas. Menyiapkan makanan sendiri sudah terbukti dapat menghemat pengeluaran. Kamu tidak perlu sering membeli makan di restoran atau pesan jajan online. Dengan adanya dapur, kamu bisa makin bersemangat memasak, sehingga jatah untuk membeli makanan jadi dapat dikurangi. Anak kost bakal bisa berhemat lebih banyak.</p></div></div></div></div>
    <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/parkir.png" class="img-responsive"><div class="info"><h3>Parkir Motor</h3><p> Lahan parkir yang luas ini bisa digunakan untuk mobil dan juga pengguna sepeda motor sehingga terlindung dari panas matahari dan hujan karena terlindung dibawah kanopi.</p></div></div></div>
    <div class="col-sm-6 wowload fadeInUp"><div class="rooms"><img src="images/photos/ruangmakan.png" class="img-responsive"><div class="info"><h3>Ruang Makan Bersama</h3><p> kami menyediakan ruang makan yang cukup luas, bersih dan nyaman dilengkapi dengan furniture, agar penghuni kost dapat menikmati makanan secara bersama-sama dengan penghuni kost lainnya.</p></div></div></div></div>
  </div> 
  </div>
</div>
<?php include 'footer.php';?>