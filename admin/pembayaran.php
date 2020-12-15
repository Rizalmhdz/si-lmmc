<?php 
$stmt = $pdo_conn->prepare('SELECT * FROM pembayaran ORDER BY tanggal_pembayaran DESC');
$stmt->execute();
$result = $stmt->fetchAll();
$stmt2 = $pdo_conn->prepare('SELECT * FROM pembayaran where tanggal_pembayaran = CURDATE()');
$stmt2->execute();
$result2 = $stmt2->fetchAll();
?>
<div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <ol class="breadcrumb">
            <li>Admin Panel</li>
            <li class="active">Pembayaran</li>
          </ol>
          <h1>Manajemen Data Pembayaran</h1>
          <p>Admin Dapat Menambah, Mengubah dan Menghapus data Pembayaran</p>

          <div class="row margin-bottom-30">
            <div class="col-md-12">
              <ul class="nav nav-pills">
                <li class="active"><a href="#">Pembayaran Hari Ini<span class="badge"><?php echo count($result2);?></span></a></li>
                <li><a href="#">Semua Data Pembayaran<span class="badge"><?php echo count($result);?></span></a></li>  
            </ul>          
            </div>
          </div> 
          <div class="row">
            <div class="col-md-12">
              <div class="btn-group pull-right" id="templatemo_sort_btn">
              <a href="index.php?page=pembayaran_tambah"><button type="button" class="btn btn-success">Tambah Data</button></a>
              </div>
              <div class="table-responsive">
                <h4 class="margin-bottom-15">Data Pembayaran</h4>
                
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>Tanggal Pembayaran</th>
                      <th>Total Pembayaran</th>
                      <th>Nama</th>
                      <th>Nama Admin Penerima</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if(!empty($result)) { 
                    foreach($result as $row) {	?>
                      <tr>
                          <?php
                          $stmt1 = $pdo_conn->prepare('SELECT * FROM admin where id_admin="'.$row["id_admin"].'"');
                          $stmt1->execute();
                          $result1 = $stmt1->fetchAll();
                          $stmt2 = $pdo_conn->prepare('SELECT * FROM pasien where no_anggota="'.$row["no_anggota"].'"');
                          $stmt2->execute();
                          $result2 = $stmt2->fetchAll();
                          ?>
                          <td><?php echo $row["tanggal_pembayaran"]; ?></td>
                          <td><?php echo $row["total_pembayaran"]; ?></td>           
                          <td><?php echo $result2[0]["nama_pasien"];; ?></td>
                          <td><?php echo $result1[0]["nama_admin"]; ?></td>
                          <td><a href="pembayaran_cetak.php?id=<?php echo $row["id_pembayaran"]; ?>" class="btn btn-warning">Cetak BP</a></td>
                          <td><a href="index.php?page=pembayaran_edit&id=<?php echo $row["id_pembayaran"]; ?>" class="btn btn-info">Ubah</a></td>
                          <td><a href="pembayaran_hapus.php?pembayaran=<?php echo $row["id_pembayaran"]; ?>" class="btn btn-danger">Hapus</a></td>
                        </tr>
                        <?php
                        } }
                        ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- <ul class="pagination pull-right">
                <li class="disabled"><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">4 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">5 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>   -->
            </div>
          </div>
        </div>
      </div>