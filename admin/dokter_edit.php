<?php 
    $stmt3 = $pdo_conn->prepare("SELECT * FROM dokter where id_dokter=". $_GET["id"]);
    $stmt3->execute();
    $result3 = $stmt3->fetchAll();
    $stmt4 = $pdo_conn->prepare("SELECT * FROM user where username='". $result3[0]['username_dokter']."'");
    $stmt4->execute();
    $result4 = $stmt4->fetchAll();
    if(isset($_POST['submit'])){
      $insertMsg="Data berhasil diubah!.";
      $pdo_statement = $pdo_conn->prepare("update user set password='" . $_POST[ 'password' ]. "', email='" . $_POST[ 'email' ]. "' where username='" . $result4[0]['username']."'");
      $result = $pdo_statement->execute();
      $pdo_statement1 = $pdo_conn->prepare("update dokter set nama_dokter='" . $_POST[ 'nama' ]. "', no_hp_dokter=" . $_POST[ 'hp' ]. ", alamat_dokter='" . $_POST[ 'alamat' ]. "', spesialis='" . $_POST[ 'spesialis' ]. "' where username_dokter='" . $result4[0]['username']."'");
      $result1 = $pdo_statement1->execute();
      ?> 
      <script>
            window.location="index.php?page=dokter";
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
            <li class="active">Tambah Data Dokter</li>
          </ol>
          <h1>Tambah Data Dokter</h1>
          <div class="row">
            <div class="col-md-12">
              <form role="form" id="templatemo-preferences-form" method="post">
                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="nama" class="control-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" required value="<?php echo $result3[0]['nama_dokter'];?>">                  
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="hp" class="control-label">No HP</label>
                    <input type="text" class="form-control" name="hp" required value="<?php echo $result3[0]['no_hp_dokter'];?>">                  
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="alamat" class="control-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" required value="<?php echo $result3[0]['alamat_dokter'];?>">                  
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="spesialis" class="control-label">Spesialis</label>
                    <input type="text" class="form-control" name="spesialis" required value="<?php echo $result3[0]['spesialis'];?>">                  
                  </div>  
                      <div class="col-md-6 margin-bottom-15">
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




