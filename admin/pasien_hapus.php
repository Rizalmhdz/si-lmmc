<?php
include("fungsi/koneksi.php");
$stmt=$pdo_conn->prepare("delete from user where username='".$_GET['hapus']."'");
$stmt->execute();

?>
<script>window.location="index.php?page=pasien";</script>