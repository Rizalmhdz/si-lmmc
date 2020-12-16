<?php 
    $stmt3 = $pdo_conn->prepare("SELECT * FROM pembayaran where id_pembayaran=". $_GET["id"]);
    $stmt3->execute();
    $result3 = $stmt3->fetchAll();
    $stmt1 = $pdo_conn->prepare("SELECT * FROM pasien ORDER BY no_anggota DESC");
    $stmt1->execute();
    $result1 = $stmt1->fetchAll();
    $stmt2 = $pdo_conn->prepare("SELECT * FROM admin ORDER BY id_admin DESC");
    $stmt2->execute();
    $result2 = $stmt2->fetchAll();
    if(isset($_POST['submit'])){
        $pdo_statement = $pdo_conn->prepare("update pembayaran set no_anggota=" . $_POST[ 'no_anggota' ]. ", id_admin=" . $_POST[ 'id_admin' ]. ", total_pembayaran=" . $_POST[ 'total_pembayaran' ]. " where id_pembayaran=" . $_GET["id"]);
        $result = $pdo_statement->execute();
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
            <li class="active">Ubah Data Pembayaran</li>
          </ol>
          <h1>Ubah Data Pembayaran</h1>
          <div class="row">
            <div class="col-md-12">
              <form role="form" id="templatemo-preferences-form" method="post">
                <div class="row">
                        <div class="col-md-6 margin-bottom-15">
                        <label for="no_anggota">No Anggota</label>
                        <input type="number" class="form-control" name="no_anggota" required value="<?php echo $result3[0]['no_anggota'];?>"> 
                        </div>                  
                        <div class="col-md-6 margin-bottom-15">
                        <label for="id_admin">id Admin Penerima</label>
                        <input type="number" class="form-control" name="id_admin" required value="<?php echo $result3[0]['id_admin'];?>">   
                        </div>                                 
                </div>
                <div class="row">
                <div class="col-md-6 margin-bottom-15">
                        <label for="total_pembayaran" class="control-label">Total Pembayaran</label>
                        <input type="number" class="form-control" name="total_pembayaran" required value="<?php echo $result3[0]['total_pembayaran'];?>">           
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
            </div>
            
          </div>
          
</div>





