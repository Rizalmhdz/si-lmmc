<?php
include("fungsi/koneksi.php");
$stmt=$pdo_conn->prepare("delete from pembayaran where id_pembayaran='".$_GET['pembayaran']."'");
$stmt->execute();

?>
<script>window.location="index.php?page=pembayaran";</script>