<?php 
    $stmt1 = $pdo_conn->prepare("SELECT * FROM pasien ORDER BY no_anggota DESC");
    $stmt1->execute();
    $result1 = $stmt1->fetchAll();
    $stmt2 = $pdo_conn->prepare("SELECT * FROM admin ORDER BY id_admin DESC");
    $stmt2->execute();
    $result2 = $stmt2->fetchAll();
    if(isset($_POST['submit'])){
      $sql = "INSERT INTO pembayaran (no_anggota, id_admin, total_pembayaran, tanggal_pembayaran) VALUES (:no_anggota, :id_admin, :total_pembayaran, CURDATE())";
      $stmt = $pdo_conn->prepare( $sql );
      $result = $stmt->execute(array(':no_anggota' => $_POST['no_anggota'], ':id_admin' =>$_POST['id_admin'],':total_pembayaran' =>$_POST['total_pembayaran']));
      ?> 
        <script>
                window.location="index.php?page=pembayaran";
        </script><?php
}
?>
<div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <ol class="breadcrumb">
            <li>Admin Panel</li>
            <li class="active">Tambah Data Pembayaran</li>
          </ol>
          <h1>Tambah Data Pembayaran</h1>
          <div class="row">
            <div class="col-md-12">
              <form role="form" id="templatemo-preferences-form" method="post">
                <div class="row">
                        <div class="col-md-6 margin-bottom-15">
                        <label for="no_anggota">No Anggota</label>
                        <input type="number" class="form-control" name="no_anggota" required > 
                        </div>                  
                        <div class="col-md-6 margin-bottom-15">
                        <label for="id_admin">Nama Admin Penerima</label>
                        <input type="number" class="form-control" name="id_admin" required > 
                        </div>                                   
                </div>
                <div class="row">
                <div class="col-md-6 margin-bottom-15">
                        <label for="total_pembayaran" class="control-label">Total Pembayaran</label>
                        <input type="number" class="form-control" name="total_pembayaran" required >           
                      </div>      
                </div>
                <div class="row templatemo-form-buttons">
                        <div class="col-md-12">
                          <button type="submit" name="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </div>  
                  </div>
                </form>        
             </div>
            </div>
            
          </div>
          
</div>




