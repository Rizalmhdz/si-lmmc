<?php
    include 'koneksi1.php';

    if(isset($_GET['id_rekam_medis'])){
        // Prepared statement untuk menghapus data
        $query = $db->prepare("DELETE FROM `rekam_medis` WHERE id_rekam_medis=:id_rekam_medis");
        $query->bindParam(":id_rekam_medis", $_GET["id_rekam_medis"]);
        // Jalankan Perintah SQL
        $query->execute();
        // Alihkan ke index.php
        header("location: index1.php");
    }
?>