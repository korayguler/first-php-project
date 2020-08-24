<?php include "ayar.php"; session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>WM Sohbet - Yönetim Paneli</title>
<link rel="shortcut icon" href="img/ico.png"/>
<link rel="stylesheet" type="text/css" href="style.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<script language="javascript" type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.5.2.min.js"></script>
</head>
<body>
</body>
</html>
<?php
if (isset($_GET["id"])){//get metodu ile id değeri gönderildiyse
    $id=$_GET["id"];
    $sor=mysql_query("delete from uyeler where id='$id'");//id değerine eşit id'li kaydı sil
    if ($sor){
        echo"<script>alert('Kayıt Başarıyla Silindi...')</script>";header("Refresh:1;url=admin.php");
    }else{
	    echo"<script>alert('Kayıt Bir Neden Sebebiyle Silinemedi...')</script>";header("Refresh:1;url=admin.php");
    }

}else { echo"<script>alert('Bir Sorun Nedenniyle Bu İşlemi Gerçekleştiremiyoruz...')</script>";header("Refresh:1;url=admin.php");}
?>