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
      $sql = "INSERT INTO user (username, password, email, level) VALUES (:username, :password, :email, 4)";
      $stmt = $pdo_conn->prepare( $sql );
      $sql1 = "INSERT INTO apoteker (username_apoteker, nama_apoteker, no_hp_apoteker, alamat_apoteker) VALUES (:username_apoteker, :nama_apoteker, :no_hp_apoteker, :alamat_apoteker)";
      $stmt1 = $pdo_conn->prepare( $sql1 );
      $result = $stmt->execute(array(':username' => $_POST['username'], ':password' =>$_POST['password'],':email' =>$_POST['email']));
      $result1 = $stmt1->execute(array(':username_apoteker' => $_POST['username'], ':nama_apoteker'=> $_POST['nama'], ':no_hp_apoteker' => $_POST['hp'], ':alamat_apoteker' => $_POST['alamat']));
      ?> 
        <script>
                window.location="index.php?page=apoteker";
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
            <li class="active">Tambah Data Apoteker</li>
          </ol>
          <h1>Tambah Data Apoteker</h1>
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
                  <div class="col-md-12 margin-bottom-15">
                    <label for="alamat" class="control-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" required>                  
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




