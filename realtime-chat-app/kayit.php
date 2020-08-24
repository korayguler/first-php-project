<?php include "ayar.php"; session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="img/ico.png"/>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.5.2.min.js"></script>
<title>WM Sohbet - Kayıt</title
</head>

<body><br/>
<div id="kayitt">
<form action="kayit.php" method="post" name="uye_form">

<span><input type="text" name="k_adi" class="input_1" placeholder="Kullanıcı Adı"/></span>
<span><input type="mail" name="e_mail" class="input_3" placeholder="E-Mail Adresi"/></span>
<input type="password" name="sifre1" class="input_2"placeholder="Şifre"/></span>
<input type="password" name="sifre2" class="input_2"placeholder="Şifre"/></span>
<span><input type="submit" class="submit_" value="Gönder" style="border-radius:4px;"/></span>
<span><a href="index.php" class="submit_1">Giriş Yap</a></span>



</form>
</div>
<p style="font-size:80px;font-family: 'Lobster', cursive; color:white;text-shadow:5px 5px 5px black;margin-left:auto;margin-right:auto; width:370px;">WM Sohbet</p>

</body>
</html>


<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{


$k_adi = $_POST["k_adi"];
$sifre1 = $_POST["sifre1"];
$sifre2 = $_POST["sifre2"];
$e_mail = $_POST["e_mail"];
$button = $_POST["button"];


if($k_adi=="" or $sifre1=="" or $sifre2=="" or $e_mail=="")
{
	echo "<script>alert('Lütfen Boş Alanları Doldurunuz...')</script>";
	header("Refresh: 1; url=kayit.php");
	return;
}
elseif($sifre1 != $sifre2)
{
	echo "<script>alert('Şifreler Uyuşmuyor...')</script>";
	header("Refresh: 1; url=kayit.php");
	return;
}

function checkmail($e_mail){
  return filter_var($e_mail, FILTER_VALIDATE_EMAIL);
}

if(!checkmail($e_mail))
{
	echo "<script>alert('Geçersiz Mail Biçimi...')</script>";
	header("Refresh: 1; url=kayit.php");
	return;
}

$isim_kontrol = mysql_query("select * from uyeler where uyeAdi='".$k_adi."'") or die (mysql_error());

$uye_varmi = mysql_num_rows($isim_kontrol);
if($uye_varmi > 0)
{
	echo "<script>alert('Kullanıcı Adı Başka Bir Üye Tarafından Kullanılıyor...')</script>";
	header("Refresh: 1; url=kayit.php");
	return;
}

$eposta_kontrol = mysql_query("select * from uyeler where email='".$e_mail."'") or die (mysql_error());

$eposta_varmi = mysql_num_rows($eposta_kontrol);
if($eposta_varmi > 0)
{
	echo "<script>alert('E-mail Adresi Başka Bir Üye Tarafından Kullanılıyor...')</script>";
	header("Refresh: 1; url=kayit.php");
	return;
}

$yenikayit = "INSERT INTO uyeler (uyeAdi, email, sifre, tarih)values('".$k_adi."','".$e_mail."' ,'".md5(md5($sifre1))."', '$tarih')";

$sorgu = mysql_query($yenikayit);

echo "<script>alert('Kayıt İşlemi Başarılı...')</script>";
header("Refresh: 1; url=index.php");


mysql_close();
}


ob_end_flush();
?>
