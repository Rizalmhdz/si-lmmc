<?php 
if(isset($_POST['submit'])){
  $stmt = $pdo_conn->prepare("SELECT * FROM user where username='".$_POST['username']."'");
  $stmt->execute();
  $result = $stmt->fetchAll();
  if(!empty($result)) { 
    $errorMsg="Username telah digunakan oleh orang lain.";
    }
  else{
      $insertMsg="Data berhasil ditambahkan!.";
      $sql = "INSERT INTO user (username, password, email, level) VALUES (:username, :password, :email, 2)";
      $stmt = $pdo_conn->prepare( $sql );
      $sql1 = "INSERT INTO pasien (username_pasien, nama_pasien, no_hp_pasien, no_bpjs, no_ktp, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, instansi, gol_darah, tanggal_masuk) VALUES (:username_pasien, :nama_pasien, :no_hp_pasien, :no_bpjs, :no_ktp, :tempat_lahir, :tanggal_lahir, :jenis_kelamin, :agama, :instansi, :gol_darah, CURDATE())";
      $stmt1 = $pdo_conn->prepare( $sql1 );
      $result = $stmt->execute(array(':username' => $_POST['username'], ':password' =>$_POST['password'],':email' =>$_POST['email']));
      $result1 = $stmt1->execute(array(':username_pasien' => $_POST['username'], ':nama_pasien'=> $_POST['nama'], ':no_hp_pasien' => $_POST['hp'], ':no_bpjs' => $_POST['bpjs'], ':no_ktp' => $_POST['ktp'], ':tempat_lahir' => $_POST['tempat_lahir'], ':tanggal_lahir' => $_POST['tanggal_lahir'], ':jenis_kelamin' => $_POST['jk'], ':agama' => $_POST['agama'], ':instansi' => $_POST['instansi'], ':gol_darah' => $_POST['gol_darah']));
      ?> 
      <script>
      window.location="index.php?page=pasien";
      </script><?php
    }
    
}
?>
<style type ="text/css">
.msg{
	width:50rem;
    height:10rem;
}
.alert{padding:.75rem 1.25rem;border:1px solid transparent;border-radius:.25rem}
.alert-success{color:#155724;background-color:#d4edda;border-color:#c3e6cb}
.alert-danger{color:#721c24;background-color:#f8d7da;border-color:#f5c6cb}
</style>
<div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <ol class="breadcrumb">
            <li>Admin Panel</li>
            <li class="active">Tambah Data Pasien</li>
          </ol>
          <h1>Tambah Data Pasien</h1>
          <div class="row">
            <div class="col-md-12">
              <form role="form" id="templatemo-preferences-form" method="post">
                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="nama" class="control-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" required>                  
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="hp" class="control-label">No HP</label>
                    <input type="text" class="form-control" name="hp" required>                  
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="bpjs" class="control-label">No BPJS</label>
                    <input type="text" class="form-control" name="bpjs" required>                  
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="ktp" class="control-label">No KTP</label>
                    <input type="text" class="form-control" name="ktp" required>                  
                  </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 margin-bottom-15">
                      <label for="tempat_lahir" class="control-label">Tempat Lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" required>                  
                    </div>
                    <div class="col-md-6 margin-bottom-15">
                      <label for="tanggal_lahir" class="control-label">Tanggal Lahir</label>
                      <div class="input-group-icon">
                          <input name="tanggal_lahir" type="date" min="1980-01-01" max="2025-12-12" value="2000-12-17" /> 
                      </div>                
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 margin-bottom-15">
                        <label for="jk" class="control-label">Jenis Kelamin</label>
                        <div>
                          <input type="radio" id="jk" name="jk" value="L" required/>
                          <label for="jk"><span></span>Laki-laki</label>
                        </div>
                        <div>
                          <input type="radio" id="jk" name="jk" value="P" required/>
                          <label for="jk"><span></span>Perempuan</label>
                        </div>
                    </div>
                    <div class="col-md-6 margin-bottom-15">
                        <label for="agama">Agama</label>
                        <select class="form-control margin-bottom-15" name="agama" required>
                          <option>ISLAM</option>
                          <option>Kristen</option>
                          <option>Katolik</option>
                          <option>Hindu</option>
                          <option>Budha</option>
                          <option>Khonghucu</option>
                        </select>
                      </div>                           
                </div>
                <div class="row">
                    <div class="col-md-6 margin-bottom-15">
                      <label for="instansi" class="control-label">Instansi</label>
                      <input type="text" class="form-control" name="instansi">                  
                    </div>
                    <div class="col-md-6 margin-bottom-15">
                        <label for="gol_darah">Golongan Darah</label>
                        <select class="form-control margin-bottom-15" name="gol_darah" required>
                          <option>A</option>
                          <option>B</option>
                          <option>AB</option>
                          <option>O</option>
                        </select>
                      </div>  
                  </div>
                  <div class="row">
                      <div class="col-md-12 margin-bottom-15">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" class="form-control" name="email" required >           
                      </div>
                      
                  </div>
                  <div class="row">
                    <div class="col-md-6 margin-bottom-15">
                        <label for="username" class="control-label">Username</label>
                        <input type="text" class="form-control" name="username" required >           
                      </div>
                      <div class="col-md-6 margin-bottom-15">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" class="form-control" name="password" required>                  
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
             <div class="msg">
                    <?php
                    if(isset($errorMsg))
                    {
                        ?>
                        <div class="alert alert-danger">
                            <strong>UPS! <?php echo $errorMsg; ?></strong>
                        </div>
                        <?php
                    }
                    if(isset($insertMsg)){
                    ?>
                        <div class="alert alert-success">
                            <strong>SUCCESS! <?php echo $insertMsg; ?></strong>
                        </div>
                    <?php
                    }
                    ?> 
                </div>
            </div>
            
          </div>
          
</div>




