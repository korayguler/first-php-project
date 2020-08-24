<?php
$host="localhost";
$user="root";
$pass="";
$dbname="wmsohbet";

try
{
$db=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e)
{
echo "veritabanı bağlantısı sağlanamadı. ". $e->getMessage();
}

?>