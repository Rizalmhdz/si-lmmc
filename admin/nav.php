<?php
    $page=isset($_GET['page']) ? $_GET['page']: 'admin';
?>
<div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
          <li <?php if($page == "admin"){echo 'class="active"';}?>><a href="index.php?page=admin"><i class="fa fa-users"></i>Admin</a></li>
          <li <?php if($page == "pasien"){echo 'class="active"';}?>><a href="index.php?page=pasien"><i class="fa fa-users"></i>Pasien</a></li>
          <li <?php if($page == "dokter"){echo 'class="active"';}?>><a href="index.php?page=dokter"><i class="fa fa-users"></i>Dokter</a></li>
          <li <?php if($page == "apoteker"){echo 'class="active"';}?>><a href="index.php?page=apoteker"><i class="fa fa-users"></i>Apoteker</a></li>
          <li <?php if($page == "pembayaran"){echo 'class="active"';}?>><a href="index.php?page=pembayaran"><i class="fa fa-users"></i>Pembayaran</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Keluar</a></li>
        </ul>
      </div><!--/.navbar-collapse --> 
      <!-- Modal -->
      <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Tutup</span></button>
              <h4 class="modal-title" id="myModalLabel">Apakah anda yakin ingin keluar?</h4>
            </div>
            <div class="modal-footer">
              <a href="logout.php" class="btn btn-primary">YA</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
            </div>
          </div>
        </div>
      </div>