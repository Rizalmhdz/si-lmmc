<?php 
try { 
    $pdo_conn = new PDO('mysql:host=localhost;dbname=klinik', 'root', '',
    array(PDO::ATTR_PERSISTENT => true)); 
} 
catch(PDOException $e) { echo $e->getMessage(); 
} 
?>
