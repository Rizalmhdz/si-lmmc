<?php 
$stmt = $pdo_conn->prepare('SELECT * FROM pasien ORDER BY no_anggota DESC');
$stmt->execute();
$result = $stmt->fetchAll();
?>
<div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <ol class="breadcrumb">
            <li>Admin Panel</li>
            <li class="active">Pasien</li>
          </ol>
          <h1>Manajemen Data Pasien</h1>
          <p>Admin Dapat Menambah, Mengubah dan Menghapus data Pasien</p>

          <div class="row margin-bottom-30">
            <div class="col-md-12">
              <ul class="nav nav-pills">
                <li class="active"><a href="#">Terdaftar<span class="badge"><?php echo count($result);?></span></a></li>
              </ul>          
            </div>
          </div> 
          <div class="row">
            <div class="col-md-12">
              <div class="btn-group pull-right" id="templatemo_sort_btn">
                <a href="index.php?page=pasien_tambah"><button type="button" class="btn btn-success">Tambah Data</button></a>            
              </div>
              <div class="table-responsive">
                <h4 class="margin-bottom-15">Data Pasien</h4>
                
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>No Anggota</th>
                      <th>Nama</th>
                      <th>Tanggal Masuk</th>
                      <th>No HP</th>
                      <th>No BPJS</th>
                      <th>No KTP</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Jenis Kelamin</th>
                      <th>Agama</th>
                      <th>Instansi</th>
                      <th>Golongan Darah</th>
                      <th>Email</th>
                      <th>Username</th>
                      <th>Password</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if(!empty($result)) { 
                    foreach($result as $row) {	?>
                      <tr>
                          <?php
                          $stmt1 = $pdo_conn->prepare('SELECT * FROM user where username="'.$row["username"].'"');
                          $stmt1->execute();
                          $result1 = $stmt1->fetchAll();
                          ?>
                          <td><?php echo $row["no_anggota"]; ?></td>
                          <td><?php echo $row["nama_pasien"]; ?></td>
                          <td><?php echo $row["tanggal_masuk"]; ?></td>
                          <td><?php echo $row["no_hp_pasien"]; ?></td>
                          <td><?php echo $row["no_bpjs"]; ?></td>
                          <td><?php echo $row["no_ktp"]; ?></td>
                          <td><?php echo $row["tempat_lahir"]; ?></td>
                          <td><?php echo $row["tanggal_lahir"]; ?></td>
                          <td><?php echo $row["jenis_kelamin"]; ?></td>
                          <td><?php echo $row["agama"]; ?></td>
                          <td><?php echo $row["instansi"]; ?></td>
                          <td><?php echo $row["gol_darah"]; ?></td>
                          <td><?php echo $result1[0]["email"]; ?></td>
                          <td><?php echo $result1[0]["username"]; ?></td>
                          <td><?php echo $result1[0]["password"]; ?></td>
                          <td><a href="pasien_cetak.php?id=<?php echo $row["no_anggota"]; ?>" class="btn btn-warning">Cetak KA</a></td>
                          <td><a href="index.php?page=pasien_edit&id=<?php echo $row["no_anggota"]; ?>" class="btn btn-info">Ubah</a></td>
                          <td><a href="pasien_hapus.php?hapus=<?php echo $result1[0]["username"]; ?>" class="btn btn-danger">Hapus</a></td>
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