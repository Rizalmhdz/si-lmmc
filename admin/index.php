<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Dashboard</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/templatemo_main.css">
    <?php
    include("fungsi/koneksi.php");
    ?>
    
</head>
<body>
<div id="main-wrapper">
<?php
    include("sidebar.php");
    ?>
    <div class="template-page-wrapper">
    <?php
    include("nav.php");
    $page=isset($_GET['page']) ? $_GET['page']: 'admin';
    include_once($page.".php");
?>
      <footer class="templatemo-footer">
        <div class="templatemo-copyright">
          <p>Copyright &copy; 2020 KLINIK ULM</p>
        </div>
      </footer>
</div>
</div>
</body>
</html>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/templatemo_script.js"></script>
