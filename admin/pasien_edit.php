<?php 
    $stmt3 = $pdo_conn->prepare("SELECT * FROM pasien where no_anggota=". $_GET["id"]);
    $stmt3->execute();
    $result3 = $stmt3->fetchAll();
    $stmt4 = $pdo_conn->prepare("SELECT * FROM user where username='". $result3[0]['username_pasien']."'");
    $stmt4->execute();
    $result4 = $stmt4->fetchAll();
if(isset($_POST['submit'])){
      $insertMsg="Data berhasil diubah!.";
      $pdo_statement = $pdo_conn->prepare("update user set password='" . $_POST[ 'password' ]. "', email='" . $_POST[ 'email' ]. "' where username='" . $result4[0]['username']."'");
      $result = $pdo_statement->execute();
      $pdo_statement1 = $pdo_conn->prepare("update pasien set nama_pasien='" . $_POST[ 'nama' ]. "', no_hp_pasien=" . $_POST[ 'hp' ]. ", no_bpjs=" . $_POST[ 'bpjs' ]. ", no_ktp=" . $_POST[ 'ktp' ]. ", tempat_lahir='" . $_POST[ 'tempat_lahir' ]. "', tanggal_lahir='" . $_POST[ 'tanggal_lahir' ]. "', jenis_kelamin='" . $_POST[ 'jk' ]. "', agama='" . $_POST[ 'agama' ]. "', instansi='" . $_POST[ 'instansi' ]. "', gol_darah='" . $_POST[ 'gol_darah' ]. "' where username_pasien='" . $result4[0]['username']."'");
      $result1 = $pdo_statement1->execute();
      ?> 
      <script>
            window.location="index.php?page=pasien";
      </script><?php   
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
            <li class="active">Ubah Data Pasien</li>
          </ol>
          <h1>Ubah Data Pasien</h1>
          <div class="row">
            <div class="col-md-12">
              <form role="form" id="templatemo-preferences-form" method="post">
                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="nama" class="control-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" required value="<?php echo $result3[0]['nama_pasien'];?>">                  
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="hp" class="control-label">No HP</label>
                    <input type="text" class="form-control" name="hp" required value="<?php echo $result3[0]['no_hp_pasien'];?>">                  
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="bpjs" class="control-label">No BPJS</label>
                    <input type="text" class="form-control" name="bpjs" required value="<?php echo $result3[0]['no_bpjs'];?>">                  
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="ktp" class="control-label">No KTP</label>
                    <input type="text" class="form-control" name="ktp" required value="<?php echo $result3[0]['no_ktp'];?>">                   
                  </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 margin-bottom-15">
                      <label for="tempat_lahir" class="control-label">Tempat Lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" required value="<?php echo $result3[0]['tempat_lahir'];?>">                  
                    </div>
                    <div class="col-md-6 margin-bottom-15">
                      <label for="tanggal_lahir" class="control-label">Tanggal Lahir</label>
                      <div class="input-group-icon">
                          <input name="tanggal_lahir" type="date" min="1980-01-01" max="2025-12-12" value="<?php echo $result3[0]['tanggal_lahir'];?>" /> 
                      </div>                
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 margin-bottom-15">
                        <label for="jk" class="control-label">Jenis Kelamin</label>
                        <div>
                          <input type="radio" id="jk" name="jk" value="L" required <?php if($result3[0]['jenis_kelamin']=="L"){echo "checked";} ?>/>
                          <label for="jk"><span></span>Laki-laki</label>
                        </div>
                        <div>
                          <input type="radio" id="jk" name="jk" value="P" required <?php if($result3[0]['jenis_kelamin']=="P"){echo "checked";} ?>/>
                          <label for="jk"><span></span>Perempuan</label>
                        </div>
                    </div>
                    <div class="col-md-6 margin-bottom-15">
                        <label for="agama">Agama</label>
                        <select class="form-control margin-bottom-15" name="agama" required>
                          <option <?php if($result3[0]['agama']=="ISLAM"){echo "selected";} ?>>ISLAM</option>
                          <option <?php if($result3[0]['agama']=="Kristen"){echo "selected";} ?>>Kristen</option>
                          <option <?php if($result3[0]['agama']=="Katolik"){echo "selected";} ?>>Katolik</option>
                          <option <?php if($result3[0]['agama']=="Hindu"){echo "selected";} ?>>Hindu</option>
                          <option <?php if($result3[0]['agama']=="Budha"){echo "selected";} ?>>Budha</option>
                          <option <?php if($result3[0]['agama']=="Khonghucu"){echo "selected";} ?>>Khonghucu</option>
                        </select>
                      </div>                           
                </div>
                <div class="row">
                    <div class="col-md-6 margin-bottom-15">
                      <label for="instansi" class="control-label">Instansi</label>
                      <input type="text" class="form-control" name="instansi" value="<?php echo $result3[0]['instansi'];?>">                  
                    </div>
                    <div class="col-md-6 margin-bottom-15">
                        <label for="gol_darah">Golongan Darah</label>
                        <select class="form-control margin-bottom-15" name="gol_darah" required>
                          <option <?php if($result3[0]['gol_darah']=="A"){echo "selected";} ?>>A</option>
                          <option <?php if($result3[0]['gol_darah']=="B"){echo "selected";} ?>>B</option>
                          <option <?php if($result3[0]['gol_darah']=="AB"){echo "selected";} ?>>AB</option>
                          <option <?php if($result3[0]['gol_darah']=="O"){echo "selected";} ?>>O</option>
                        </select>
                      </div>  
                  </div>
                  <div class="row">
                      <div class="col-md-12 margin-bottom-15">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" class="form-control" name="email" required value="<?php echo $result4[0]['email'];?>">           
                      </div>
                      
                  </div>
                  <div class="row">
                    <div class="col-md-6 margin-bottom-15">
                        <label for="username" class="control-label">Username</label></br>
                        <label for="username" class="control-label"><?php echo $result4[0]['username'];?></label>          
                      </div>
                      <div class="col-md-6 margin-bottom-15">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" class="form-control" name="password" required value="<?php echo $result4[0]['password'];?>">                  
                      </div>
                  </div>
                    <div class="row templatemo-form-buttons">
                        <div class="col-md-12">
                          <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
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




