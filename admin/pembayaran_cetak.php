<?php
include("fungsi/koneksi.php");
    $stmt3 = $pdo_conn->prepare("SELECT * FROM pembayaran where id_pembayaran=". $_GET["id"]);
    $stmt3->execute();
    $result3 = $stmt3->fetchAll();
    $stmt1 = $pdo_conn->prepare("SELECT * FROM pasien where no_anggota=". $result3['0']['no_anggota']);
    $stmt1->execute();
    $result1 = $stmt1->fetchAll();
    $stmt2 = $pdo_conn->prepare("SELECT * FROM admin where id_admin=". $result3['0']['id_admin']);
    $stmt2->execute();
    $result2 = $stmt2->fetchAll();
    ?>
    
<!DOCTYPE html>
<head>
            
  <meta charset="utf-8">
 
  <title>Pembayaran</title>
  <link rel="stylesheet" type="text/css" href="gambarnya.css">
</head>
<body>
    <div class="gambar_belakang">
        

        <img src="gambar/pembayaran.png" width="800" height="366">
        
        <div class="nomor_id">
                <label for="nomor_id" class="no_id"><?php echo $result3['0']['id_pembayaran'];?></label>
        </div>
            
        <div class="nama">
                <label for="nama" class="nama_anggota"><?php echo $result1['0']['nama_pasien'];?></label>
        </div>

        <div class="admin">
                <label for="admin" class="nama_admin"><?php echo $result2['0']['nama_admin'];?></label>
        </div>
        
        <div class="total_semua">
                <label for="total_semua" class="total"><?php echo $result3['0']['total_pembayaran'];?></label>
        </div>
          
        <div class="koma">
                        <script type='text/javascript'>
                                
                                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                                var date = new Date();
                                var day = date.getDate();
                                var month = date.getMonth();
                                var thisDay = date.getDay(),
                                    thisDay = myDays[thisDay];
                                var yy = date.getYear();
                                var year = (yy < 1000) ? yy + 1900 : yy;
                                document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                               
                        </script>
        </div>
    </div>
</body>
</html>