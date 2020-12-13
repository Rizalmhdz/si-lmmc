<?php
session_start();
include("../../koneksi.php");

if($_SESSION['user']!=4){
   echo "<script type='text/javascript'>window.location.href = '../../login.php' ; </script>";
}

$get_id = $db->prepare('SELECT id_apoteker FROM apoteker WHERE username = :username');
$get_id->bindParam(":username", $_SESSION['username']);
$get_id->execute();
$tabel_apoteker = $get_id->fetch();
$id_apoteker = $tabel_apoteker['id_apoteker'];

$select = $db->prepare('SELECT * FROM obat');
$select->execute();


if(isset($_REQUEST['update_id'])){
  $update_id = $_REQUEST['update_id'];
  $update = true;

  $updateView = $db->prepare('SELECT * FROM obat WHERE id_obat = :id_obat');
  $updateView->bindParam(":id_obat", $update_id);
  $updateView->execute();
  $rowUpdate = $updateView->fetch();
}

if(isset($_REQUEST['tambah'])){
  try
	{
  $nama_obat = $_POST['nama_obat'];
  $tanggal_obat = $_POST['tanggal_obat'];
  $jenis_obat = $_POST['jenis_obat'];
  $satuan_obat = $_POST['satuan_obat'];
  $jumlah_obat = $_POST['jumlah_obat'];
  $harga_obat = $_POST['harga_obat'];
  $keterangan = $_POST['keterangan'];
  if($nama_obat=="" || $tanggal_obat=="" || $jenis_obat=="" || $satuan_obat=="" || $jumlah_obat=="" || $harga_obat=="" || $keterangan==""){
    $errorMsg="data tidak boleh kosong!";
  }

  else{
    $inputData = $db->prepare('INSERT INTO obat VALUES("", :fid_apoteker, :fnama_obat, :ftanggal_obat, :fjenis_obat, :fjumlah_obat, :fsatuan_obat, :fharga_obat, :fketerangan)');
    $inputData->bindParam(":fid_apoteker", $id_apoteker);
    $inputData->bindParam(":fnama_obat", $nama_obat);
    $inputData->bindParam(":ftanggal_obat", $tanggal_obat);
    $inputData->bindParam(":fjenis_obat", $jenis_obat);
    $inputData->bindParam(":fsatuan_obat", $satuan_obat);
    $inputData->bindParam(":fjumlah_obat", $jumlah_obat);
    $inputData->bindParam(":fharga_obat", $harga_obat);
    $inputData->bindParam(":fketerangan", $keterangan);
    $inputData->execute();

    $insertMsg="Data berhasil diTambahkan!";
    echo "<script type='text/javascript'>window.location.href = 'data obat.php' ; </script>";
  }   
}
catch(PDOException $e)
{
	 $e->getMessage();
}
}

if(isset($_REQUEST['delete_id'])){
  $delete_id = $_REQUEST['delete_id'];
  $hapus = $db->prepare('DELETE FROM obat WHERE id_obat = :id_obat');
  $hapus->bindParam(':id_obat', $delete_id);
  $hapus->execute();
  echo "<script type='text/javascript'>window.location.href = 'data obat.php' ; </script>";
}

if(isset($_REQUEST['save'])){
  
  $nama_obat = $_POST['nama_obat'];
  $tanggal_obat = $_POST['tanggal_obat'];
  $jenis_obat = $_POST['jenis_obat'];
  $satuan_obat = $_POST['satuan_obat'];
  $jumlah_obat = $_POST['jumlah_obat'];
  $harga_obat = $_POST['harga_obat'];
  $keterangan = $_POST['keterangan'];

  if($nama_obat=="" || $tanggal_obat=="" || $jenis_obat=="" || $satuan_obat=="" || $jumlah_obat=="" || $harga_obat=="" || $keterangan==""){
    $errorMsg="data tidak boleh kosong!";
  }
  else{
  $update_id = $_REQUEST['update_id'];
  $update = $db->prepare('UPDATE obat SET id_apoteker=:fid_apoteker, nama_obat=:fnama_obat, tanggal_obat=:ftanggal_obat, jenis_obat=:fjenis_obat, 
  jumlah_obat=:fjumlah_obat, satuan_obat=:fsatuan_obat, harga_obat=:fharga_obat, keterangan=:fketerangan WHERE id_obat=:id_obat');
    $update->bindParam(":fid_apoteker", $id_apoteker);
    $update->bindParam(":fnama_obat", $nama_obat);
    $update->bindParam(":ftanggal_obat", $tanggal_obat);
    $update->bindParam(":fjenis_obat", $jenis_obat);
    $update->bindParam(":fsatuan_obat", $satuan_obat);
    $update->bindParam(":fjumlah_obat", $jumlah_obat);
    $update->bindParam(":fharga_obat", $harga_obat);
    $update->bindParam(":fketerangan", $keterangan);
    $update->bindParam(":id_obat", $update_id);
    $update->execute();
    
    !isset($_REQUEST['update_id']);
  echo "<script type='text/javascript'>window.location.href = 'data obat.php' ; </script>";
  }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="icon" type="image/png" href="fevicon.ico.png"/>
    <!-- Custom stylesheet -->
    
    <link rel="stylesheet" href="templatemo_main.css">
    

</head>
<body>

<main>
<div class="msg" style="text-align:center;">
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
<div class="grid-container">
          <ol class="breadcrumb">
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"></i>KELOLA DATA OBAT</h1>
          <div class="row">
            <div class="col-md-12">
              <form method="post" role="form" id="templatemo-preferences-form">
                <div class="row">
                <?php if(isset($_REQUEST['update_id'])){ ?>
                  <div class="col-md-6 margin-bottom-15">
                  <div class="item1">
                    <label for="firstName" class="control-label">Nama Obat</label>
                    <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat"
                    <?php echo $update = true ? 'value="'.$rowUpdate['nama_obat'].'"' : '' ?>
                    >                
                  </div>
</div>
                  <div class="col-md-6 margin-bottom-15">
                  <div class="item1">
                        <label for="singleSelect">Jenis Obat</label>
                        <select class="form-control margin-bottom-15" name="jenis_obat" placeholder="Jenis Obat">
                          <?php if($update == true){
                            $value_jo = $rowUpdate['jenis_obat'];
                             ?>
                          <option>Silahkan Pilih</option>
                          <option <?php echo $value_jo == "Sirup" ? 'selected="true"' : '' ?> value="Sirup">Sirup</option>
                          <option <?php echo $value_jo == "Salep" ? 'selected="true"' : '' ?> value="Salep">Salep</option>
                          <option <?php echo $value_jo == "Tablet" ? 'selected="true"' : '' ?> value="Tablet">Tablet</option>
                          <option <?php echo $value_jo == "Kapsul" ? 'selected="true"' : '' ?> value="Kapsul">Kapsul</option>
                          <option <?php echo $value_jo == "Pil" ? 'selected="true"' : '' ?> value="Pil">Pil</option>
                            <?php }?>

                        </select>
                      </div>                           
                </div>
                <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Tanggal Obat</label>
                    <input type="text" class="form-control" name="tanggal_obat" placeholder="yyyy-mm-dd"
                    value="<?php $update == true ? print $rowUpdate['tanggal_obat'] : print ""; ?>">
                    </input>                  
                  </div>
                <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Jumlah Obat</label>
                    <input type="text" class="form-control" name="jumlah_obat" placeholder="jumlah obat"
                    <?php echo $update = true ? 'value="'.$rowUpdate['jumlah_obat'].'"' : '' ?>
                    >                  
                  </div>               
                </div>

                <div class="col-md-6 margin-bottom-15">
                <div class="item1">
                        <label for="singleSelect">Satuan Obat</label>
                        <select class="form-control margin-bottom-15" name="satuan_obat">
                        <?php $value_so = $rowUpdate['satuan_obat']; ?>
                        <option>Silahkan Pilih</option>
                        <option <?php echo $value_so == "Botol" ? 'selected="true"' : '' ?> value="Botol">Botol</option>
                          <option <?php echo $value_so == "Strip" ? 'selected="true"' : '' ?> value="Strip">Strip</option>
                          <option <?php echo $value_so == "Pcs" ? 'selected="true"' : '' ?> value="Pcs">Pcs</option>
                          <option <?php echo $value_so == "Pack" ? 'selected="true"' : '' ?> value="Pack">Pack</option>
                        </select>  
</div>                       
                </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Harga Obat</label>
                    <input type="text" class="form-control" name="harga_obat" placeholder="Ketik Harga Obat"
                    <?php echo $update = true ? 'value="'.$rowUpdate['harga_obat'].'"' : '' ?>>                  
                  </div>               
              </div>
           
                  <div class="col-md-6 margin-bottom-15">
                  <div class="item1">
                    <label for="lastName" class="control-label">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Ketikan Keterangan obat"
                    <?php echo $update = true ? 'value="'.$rowUpdate['keterangan'].'"' : '' ?>
                    >                  
                  </div>
              </div>
              <?php }
              else{ ?>
                  <div class="col-md-6 margin-bottom-15">
                  <div class="item1">
                    <label for="firstName" class="control-label">Nama Obat</label>
                    <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat">                
                  </div>
</div>
                  <div class="col-md-6 margin-bottom-15">
                  <div class="item1">
                        <label for="singleSelect">Jenis Obat</label>
                        <select class="form-control margin-bottom-15" name="jenis_obat" placeholder="Jenis Obat">
                            <option>Silahkan Pilih</option>
                          <option  value="Sirup">Sirup</option>
                          <option  value="Salep">Salep</option>
                          <option  value="Tablet">Tablet</option>
                          <option  value="Kapsul">Kapsul</option>
                          <option  value="Pil">Pil</option>

                        </select>
                      </div>                           
                </div>
                <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Tanggal Obat</label>
                    <input type="text" class="form-control" name="tanggal_obat" placeholder="yyyy-mm-dd">
                    </input>                  
                  </div>
                <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Jumlah Obat</label>
                    <input type="text" class="form-control" name="jumlah_obat" placeholder="jumlah obat">                  
                  </div>               
                </div>

                <div class="col-md-6 margin-bottom-15">
                <div class="item1">
                        <label for="singleSelect">Satuan Obat</label>
                        <select class="form-control margin-bottom-15" name="satuan_obat">
                          <option>Silahkan Pilih</option>
                          <option value="Botol">Botol</option>
                          <option value="Strip">Strip</option>
                          <option value="Pcs">Pcs</option>
                          <option value="Pack">Pack</option>
                        </select>  
</div>                       
                </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Harga Obat</label>
                    <input type="text" class="form-control" name="harga_obat" placeholder="Ketik Harga Obat">                  
                  </div>               
              </div>
           
                  <div class="col-md-6 margin-bottom-15">
                  <div class="item1">
                    <label for="lastName" class="control-label">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Ketikan Keterangan obat">                  
                  </div>
              </div>
              <?php } ?>
        </div>
      </div>
</div>
        

        <!-- Bootstrap table  -->
        <center>
        <?php
        if(!isset($_REQUEST['update_id'])) { ?> <button style= "margin-top:1px;" class="btn btn-success" name="tambah"><i class='fas fa-plus'></i></button>
        <?php }
        else{ ?><button style= "margin-top:1px;" class="btn btn-info" name="save"><i class='fas fa-save'></i></button>
        <?php } ?>
        </form><br>
        <br>
        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                         <th>No</th>
                        <th>Id</th>
                        <th>Nama Obat</th>
                        <th>Jenis</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Keterangan</th>
                        <th>Apoteker</th>
                        <th>Aksi</th>

                    </tr>
        <?php
        $no = 0;
        while($row = $select->fetch()){
          $selectA = $db->prepare('SELECT nama_apoteker FROM apoteker WHERE id_apoteker = :fid_apoteker');
          $selectA->bindParam(':fid_apoteker', $row['id_apoteker']);
          $selectA->execute();
          $rowA = $selectA->fetch();
          $no++;
        ?>       
        <tr style= "height:5px;">
          
          <td ><?php echo $no; ?></td>
          <td ><?php echo $row['id_obat']?></td>
          <td><?php echo $row['nama_obat']?></td>
          <td><?php echo $row['jenis_obat']?></td>
          <td><?php echo $row['tanggal_obat']?></td>
          <td><?php echo $row['jumlah_obat']?></td>
          <td><?php echo $row['satuan_obat']?></td>
          <td><?php echo $row['harga_obat']?></td>
          <td><?php echo $row['keterangan']?></td>
          <td><?php echo $rowA['nama_apoteker']?></td>
          <td> 
           <a href="data obat.php?update_id=<?php echo $row['id_obat'];?>" style= "margin-top:1px;" class="btn btn-light" name="update"><i class='fas fa-pen-alt'></i></a>
           <a href="data obat.php?delete_id=<?php echo $row['id_obat'];?>" style= "margin-top:1px;" class="btn btn-danger" name="delete"><i class='fas fa-trash-alt'></i></a>
           
          </td>                  
        </tr>
        <?php } ?>
                </thead>

                <tbody id="tbody">
  
                </tbody>
            </table>
        </div>


    </div>
</main><script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/templatemo_script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="main.js"></script>
</body>
</html>