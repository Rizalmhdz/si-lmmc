<?php

require_once ('component.php');
include 'koneksi1.php';
if(isset($_POST['submit'])){
    $id_dokter = htmlentities($_POST['id_dokter']);
    $no_anggota = htmlentities($_POST['no_anggota']);
    $id_obat = htmlentities($_POST['id_obat']);
    $tanggal_periksa = htmlentities($_POST['tanggal_periksa']);
    $tekanan_darah = htmlentities($_POST['tekanan_darah']);
    $keluhan = htmlentities($_POST['keluhan']);
    $diagnosa = htmlentities($_POST['diagnosa']);

    $query = $db->prepare("INSERT INTO rekam_medis (id_dokter,no_anggota,id_obat,tanggal_periksa,tekanan_darah,keluhan,diagnosa) VALUES (:id_dokter,:no_anggota,:id_obat,:tanggal_periksa,:tekanan_darah,:keluhan,:diagnosa)");
    $query->bindParam(":id_dokter", $id_dokter);
    $query->bindParam(":no_anggota", $no_anggota);
    $query->bindParam(":id_obat", $id_obat);
    $query->bindParam(":tanggal_periksa", $tanggal_periksa);
    $query->bindParam(":tekanan_darah", $tekanan_darah);
    $query->bindParam(":keluhan", $keluhan);
    $query->bindParam(":diagnosa", $diagnosa);
    $query->execute();
}
try {
   // buat koneksi dengan database
   $dbh = new PDO('mysql:host=localhost;dbname=db_klinik', "root", "");
  
   // set error mode
   $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  
   // jalankan query
   $result = $dbh->query('SELECT * FROM rekam_medis');
  
   // tampilkan data
 
   // hapus koneksi
   $dbh = null;
}
catch (PDOException $e) {
   // tampilkan pesan kesalahan jika koneksi gagal
   print "Koneksi atau query bermasalah: " . $e->getMessage() . "<br/>";
   die();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="icon" type="image/png" href="fevicon.ico.png"/>
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="style.css">
    

</head>
<body>
<main>

 <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"></i>KELOLA DATA REKAM MEDIS</h1>
        <form method="post">
        <div class="d-flex justify-content-center">
            <form action="index1.php" method="post" class="w-50"> 
            <div class="pt-2">
            <label for="id_dokter" class="control-label">Id Dokter</label>
            <input type="text" class="form-control" name="id_dokter" placeholder="id dokter">
                </div>
                <div class="pt-2">
                <label for="no_anggota" class="control-label">No Anggota</label>
            <input type="text" class="form-control" name="no_anggota" placeholder="no anggota">
                </div>
                <div class="pt-2">
                <label for="id_obat" class="control-label">Id Obat</label>
            <input type="text" class="form-control" name="id_obat" placeholder="id obat">
                </div>
                <div class="pt-2">
                <label for="tanggal_periksa" class="control-label">Tanggal Periksa</label>
            <input type="date" class="form-control" name="tanggal_periksa" placeholder="tenggal periksa">                
            </div>
                <div class="pt-2">
                <label for="tekanan_darah" class="control-label">Tekanan Darah</label>
            <input type="text" class="form-control" name="tekanan_darah" placeholder="Tekanan Darah">                    
            </div>
                <div class="pt-2">
                <label for="keluhan" class="control-label">Keluhan</label>
            <input type="text" class="form-control" name="keluhan" placeholder="keluhan">
                </div>
                <div class="pt-2">
                <label for="diagnosa" class="control-label">Diagnosa</label>
            <input type="text" class="form-control" name="diagnosa" placeholder="diagnosa">
                </div>
                <div class="row pt-2">
                </div>
                <div class="d-flex justify-content-center">
               <input type="submit" value="submit" name="submit">
                </div>
            </form>
    </div>

        <!-- Bootstrap table  -->
        <div class="O">
        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                    <th>Id rekam medis </th>
                    <th>Id Dokter</th>
                    <th>No Anggota</th>
                    <th>Id Obat</th>
                        <th>Tanggal Periksa</th>
                        <th>Keluhan</th>
                        <th>Diagnosa</th>
                        <th>Tekanan Darah</th>
                        <th>Action</th>
                    </tr>
        <?php
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=db_klinik', "root", "");
  
            // set error mode
            $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
           
            // jalankan query
            $result = $dbh->query('SELECT * FROM rekam_medis');
           
            // tampilkan data
            while($row = $result->fetch()) {?>
            <tr>
              <td><?php echo "$row[0]"?></td>
              <td><?php echo "$row[1]"?></td>
              <td><?php echo "$row[2]"?></td>
              <td><?php echo "$row[3]"?></td>
              <td><?php echo "$row[4]"?></td>
              <td><?php echo "$row[5]"?></td>
              <td><?php echo "$row[6]"?></td>
              <td><?php echo "$row[7]"?></td>
              <td><a href="deleterekammedis.php?id_rekam_medis=<?php echo "$row[0]"?>"><i class="fas fa-trash-alt"style="font-size:18px"></i></a>&emsp;<a href="updaterekammedis.php?id_rekam_medis=<?php echo "$row[0]"?>"><i class="fas fa-pen-alt"style="font-size:18px"></i></a></td>

</tr>

            
            
            <?php
            }
          
            // hapus koneksi
            $dbh = null;
         }
         catch (PDOException $e) {
            // tampilkan pesan kesalahan jika koneksi gagal
            print "Koneksi atau query bermasalah: " . $e->getMessage() . "<br/>";
            die();
         }
        ?>
        <tr>
        </tr>
                </thead> 
        </div>
    </div>
    <?php
   while($row = $result->fetch(PDO::FETCH_OBJ)) {
     echo $row->id_dokter." ".$row->no_anggota." ".$row->id_obat." ".$row->tanggal_periksa." ".$row->tekanan_darah." ".$row->$keluhan." ".$row->diagnosa;  
     echo "<br />";   
    }
?>
</main>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="main.js"></script>
</body>
</html>
