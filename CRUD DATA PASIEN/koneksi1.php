<?php
// $db_host="localhost"; //localhost server 
// $db_user="root"; //database username
// $db_password=""; //database password   
// $db_name="lmmc"; //database name
$db_host="remotemysql.com"; //localhost server 
$db_user="M22KGQDNEI"; //database username
$db_password="SRko0GCJ6c"; //database password   
$db_name="M22KGQDNEI"; //database name

try
{
 $db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $pdo_conn = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password,
 array(PDO::ATTR_PERSISTENT => true)); 
}
catch(PDOEXCEPTION $e)
{
 $e->getMessage();
}