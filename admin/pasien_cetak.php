<?php
        include("fungsi/koneksi.php");
        $stmt3 = $pdo_conn->prepare("SELECT * FROM pasien where no_anggota=". $_GET["id"]);
        $stmt3->execute();
        $result3 = $stmt3->fetchAll();
    ?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
 
  <title>Kartu Anggota</title>
  <link rel="stylesheet" type="text/css" href="gambarny.css">

</head>
<body>

    <div class="gambar_depan">
        <img src="gambar/kartu_depan.png" width="48.5%" height="9%">
    </div>
    <br>
    <br>
    <br>
    <div class="gambar_belakang">
        

        <img src="gambar/kartu_belakang.png" width="48.5%" height="9%">
        
        <div class="nomor_id">
                <label for="nomor_id" class="no_id"><?php echo $result3['0']['no_anggota'];?></label>
        </div>
            
        <div class="nama">
                <label for="nama" class="nama_anggota"><?php echo $result3['0']['nama_pasien'];?></label>
        </div>

        <div class="jenis_kelamin">
                <label for="jenis_kelamin" class="jk"><?php if($result3['0']['jenis_kelamin']=='L'){
                        echo "Laki-Laki";
                        }
                        else{
                        echo "Perempuan";
                        }
                        ?></label>
        </div>
        
        <div class="user_name">
                <label for="user_name" class="username"><?php echo $result3['0']['username_pasien'];?></label>
        </div>
    </div>

  

</body>
</html>