<?php

$conn = mysqli_connect("localhost", "root", "", "arbelkost" );

function registrasi($data){
    global $conn;

    $namalengkap = ($data["namalengkap"]);
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $nohp = ($data["nohp"]);

    //cek email sudah ada atau belum
    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
    if ( mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('email sudah terdaftar')
            </script>";
        return false;
    }

    //cek konfirmasi password
    if($password != $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
            </script>";
        return false;
    }
    
    //enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambah user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$namalengkap', '$email', '$password', '$nohp')");

    return mysqli_affected_rows($conn);
}

function tambah($data){
    global $conn;

    $nomorkamar = ($data["nomorkamar"]);
    $fasilitas = ($data["fasilitas"]);
    $status = ($data["status"]);
    $harga = ($data["harga"]);

    //upload gambar
    $foto = upload();
    if(!$foto){
        return false;
    }
    //cek nomor kamar sudah ada atau belum
    $result = mysqli_query($conn, "SELECT nomorkamar FROM kamarputri WHERE nomorkamar = '$nomorkamar'");
    if ( mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Nomor Kamar Sudah Ada!')
            </script>";
        return false;
    }

    //tambah user baru ke database
    mysqli_query($conn, "INSERT INTO kamarputri VALUES ('', '$nomorkamar', '$fasilitas', '$status', '$harga', '$foto' )");

    return mysqli_affected_rows($conn);
}

function upload(){
    $namafile = $_FILES ['foto']['name'];
    $ukuranfile = $_FILES ['foto']['size'];
    $error = $_FILES ['foto']['error'];
    $tmpname = $_FILES ['foto']['tmp_name'];

    $ekstensifotovalid = ['jpg', 'jpeg', 'png'];
    $ekstensifoto = explode('.',$namafile);//memecah nama file
    $ekstensifoto = strtolower(end( $ekstensifoto ));
   

    if(!in_array($ekstensifoto, $ekstensifotovalid)){ //cek ekstensi ada atau ga
      echo "<script>
       alert('File yang diinput tidak sesuai!')
       </script>";
       return false;
   }
    if($ukuranfile > 5000000){
        echo "<script>
                alert('Ukuran file terlalu besar!')
            </script>";
        return false;
    }
    //lolos semua
    //generate nama baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensifoto;
    move_uploaded_file($tmpname, 'images/upload/'. $namafilebaru);
    return ($namafilebaru);
}

function upload1(){
    $namafile = $_FILES ['bukti']['name'];
    $ukuranfile = $_FILES ['bukti']['size'];
    $error = $_FILES ['bukti']['error'];
    $tmpname = $_FILES ['bukti']['tmp_name'];

    $ekstensifotovalid = ['jpg', 'jpeg', 'png'];
    $ekstensifoto = explode('.',$namafile);//memecah nama file
    $ekstensifoto = strtolower(end( $ekstensifoto ));
   

    if(!in_array($ekstensifoto, $ekstensifotovalid)){ //cek ekstensi ada atau ga
      echo "<script>
       alert('File yang diinput tidak sesuai!')
       </script>";
       return false;
   }
    if($ukuranfile > 5000000){
        echo "<script>
                alert('Ukuran file terlalu besar!')
            </script>";
        return false;
    }
    //lolos semua
    //generate nama baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensifoto;
    move_uploaded_file($tmpname, 'images/bukti/'. $namafilebaru);
    return ($namafilebaru);
}

function ubah($data){
	global $conn;

    $idkamar = $_POST['idkamar'];
	$nomorkamar = $_POST['nomorkamar'];	
	$fasilitas = $_POST['fasilitas'];
	$status = $_POST['status'];
	$harga = $_POST['harga'];
    $fotolama = $_POST['fotolama'];
    
    
    if( $_FILES ['foto']['error'] == 4 ) //tidak input gambar baru
    {
        $foto = $fotolama;
    }
    else {
        $foto = upload();
    }
    
	$SQL =mysqli_query($conn, "UPDATE `kamarputri` SET 
		
		`nomorkamar` = '$nomorkamar',
		`fasilitas` = '$fasilitas',
        `status` = '$status',
        `harga` = '$harga',
        `foto` = '$foto' WHERE `kamarputri`.`idkamar`='$idkamar'");
    if($status=="Tersedia"){
        mysqli_query($conn, "DELETE FROM `booking` WHERE `idkamar`='$idkamar'");        
    }
    return $SQL;
}

function booking($data){
    global $conn;

    $idbooking = ($data["idbooking"]);
    $idkamar = ($data["kamar"]);
    $iduser = ($data["iduser"]);
    $tanggalbooking = ($data["tanggalbooking"]);
    $tanggalhuni = ($data["tanggalhuni"]);

    //tambah user baru ke database
    mysqli_query($conn, "INSERT INTO booking VALUES ('', '$idkamar', '$iduser', '$tanggalbooking', '$tanggalhuni')");
    mysqli_query($conn, "UPDATE kamarputri SET `status`='Tidak Tersedia' WHERE `idkamar`='$idkamar'");
    
    return mysqli_affected_rows($conn);

}

function bayar($data){
    global $conn;

    $idkamar = ($data["kamar"]);
    $iduser = ($data["iduser"]);
    $tanggalbayar = ($data["tanggalpembayaran"]);
    $nominal = ($data["nominal"]);
   
    //upload gambar
    $bukti = upload1();
    if(!$bukti){
        return false;
    }
    
    //tambah user baru ke database
    mysqli_query($conn, "INSERT INTO bayar VALUES ('', '$idkamar', '$iduser', '$tanggalbayar', '$nominal', '$bukti', '', 'MENUNGGU KONFIRMASI')");

    return mysqli_affected_rows($conn);
}


function keluhan($data){
    global $conn;
    
    
    $iduser = ($data["iduser"]);
    $idkamar = ($data["kamar"]);
    $isi = ($data["isi"]);
   

    //tambah user baru ke database
    mysqli_query($conn, "INSERT INTO keluhan VALUES ('', '$iduser', '$idkamar', '$isi')");

    return mysqli_affected_rows($conn);

}

function update($data){
	global $conn;
    $idbayar = $_POST['idbayar'];
    $tanggalselesai = $_POST['tanggalselesai'];
	$status = $_POST['status'];
    
   
	$SQL =mysqli_query($conn, "UPDATE bayar SET 
		
		tanggalselesai = '$tanggalselesai',
        statuss = '$status'
        WHERE idbayar='$idbayar'");
        

    return mysqli_affected_rows($conn);
}



?>