<?php
    include 'koneksi1.php';
    if(!isset($_GET['id_rekam_medis'])){
        die("Error: Rekam Medis Tidak Dimasukkan");
    }
    $query = $db->prepare("SELECT * FROM `rekam_medis` WHERE id_rekam_medis = :id_rekam_medis");
    $query->bindParam(":id_rekam_medis", $_GET['id_rekam_medis']);
    $query->execute();
    if($query->rowCount() == 0){
        die("Error: Rekam Medis Tidak Ditemukan");
    }else{
        $data = $query->fetch();
    }
    if(isset($_POST['update'])){
        $id_dokter = htmlentities($_POST['id_dokter']);
        $no_anggota = htmlentities($_POST['no_anggota']);
        $id_obat = htmlentities($_POST['id_obat']);
        $tanggal_periksa = htmlentities($_POST['tanggal_periksa']);
        $tekanan_darah = htmlentities($_POST['tekanan_darah']);
        $keluhan = htmlentities($_POST['keluhan']);
        $diagnosa = htmlentities($_POST['diagnosa']);


        $query = $db->prepare("UPDATE rekam_medis SET id_dokter=:id_dokter,no_anggota=:no_anggota,id_obat=:id_obat 
        ,tanggal_periksa=:tanggal_periksa,tekanan_darah=:tekanan_darah, keluhan=:keluhan, diagnosa=:diagnosa  WHERE id_rekam_medis=:id_rekam_medis");
        $query->bindParam(":id_dokter", $id_dokter);
        $query->bindParam(":no_anggota", $no_anggota);
        $query->bindParam(":id_obat", $id_obat);
        $query->bindParam(":tanggal_periksa", $tanggal_periksa);
        $query->bindParam(":tekanan_darah", $tekanan_darah);
        $query->bindParam(":keluhan", $keluhan);
        $query->bindParam(":diagnosa", $diagnosa);
        $query->bindParam(":id_rekam_medis", $_GET['id_rekam_medis']);
        $query->execute();
        header("location: index1.php");
    }
?>
<div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"></i>KELOLA DATA REKAM MEDIS</h1>
        <form method="post">
        <div class="d-flex justify-content-center">
            <form method="post" class="w-50"> 
            <div class="pt-2">
            <label for="id_rekam_medis" class="control-label">Id Rekam Medis</label>
            <input type="text" class="form-control" name="id_rekam_medis" value="<?php echo $data["id_rekam_medis"];?>" readonly>
                </div>
                <div class="pt-2">
                <label for="id_dokter" class="control-label">Id Dokter</label>
            <input type="text" class="form-control" name="id_dokter"  value="<?php echo $data["id_dokter"];?>">
                </div>
                <div class="pt-2">
                <label for="no_anggota" class="control-label">No Anggota</label>
            <input type="text" class="form-control" name="no_anggota"  value="<?php echo $data["no_anggota"];?>">
                </div>
                <div class="pt-2">
                <label for="id_obat" class="control-label">Id Obat</label>
            <input type="text" class="form-control" name="id_obat"  value="<?php echo $data["id_obat"];?>">                
            </div>
                <div class="pt-2">
                <label for="tanggal_periksa" class="control-label">Tanggal Periksa</label>
            <input type="date" class="form-control" name="tanggal_periksa" value="<?php echo $data["tanggal_periksa"];?>">                    
            </div>
                <div class="pt-2">
                <label for="tekanan_darah" class="control-label">Tekanan Darah</label>
            <input type="text" class="form-control" name="tekanan_darah"  value="<?php echo $data["tekanan_darah"];?>">
                </div>
                <div class="pt-2">
                <label for="keluhan" class="control-label">Keluhan</label>
            <input type="text" class="form-control" name="keluhan"  value="<?php echo $data["keluhan"];?>">
                </div>
                <div class="pt-2">
                <label for="diagnosa" class="control-label">Diagnosa</label>
            <input type="text" class="form-control" name="diagnosa"  value="<?php echo $data["diagnosa"];?>">
                </div>
                <div class="row pt-2">
                </div>
                <div class="d-flex justify-content-center">
               <input type="submit" value="submit" name="update">
                </div>
            </form>
    </div>
