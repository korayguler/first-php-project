<?php
if($_GET)
{
include("db_config.php");
$id=$_GET['id'];
$sorgu=$db->prepare("DELETE from makale WHERE id=?");
session_start();
if(isset($_SESSION["oturum"])) {
$sorgu->execute(array($id));
}
header("location:index.php");

}
?>