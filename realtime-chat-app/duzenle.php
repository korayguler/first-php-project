<?php include "ayar.php";   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>WM Sohbet - Admin Yönetim</title>
<link rel="shortcut icon" href="img/ico.png"/>
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="style.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.5.2.min.js"></script>
</head>

<?php 
$oku=mysql_fetch_array(mysql_query("select * from uyeler where id='".$_GET["id"]."'")); 
?> 
<br/>
<div id="kayitt">
<form action="kayit.php" method="post" name="uye_form">

<span><input type="text" name="k_adi" class="input_1" placeholder="Kullanýcý Adý" value="<?php echo $oku["uyeAdi"];?>"/></span>
<span><input type="text" name="e_mail" class="input_3" placeholder="E-Mail Adresi" value="<?php echo $oku["email"];?>"/></span>
<input type="text" name="rutbe" class="input_2"placeholder="Rütbe" value="<?php echo $oku["rutbe"];?>"/></span>
<input type="chatYapabilme" name="chatYapabilme" class="input_2"placeholder="Chat Yapabilme" value="<?php echo $oku["chatYapabilme"];?>"/></span>
<span><input type="submit" class="submit_22" value="KAYDET" /></span>


</form>
</div>
<p style="font-size:80px;font-family: 'Lobster', cursive; color:white;text-shadow:5px 5px 5px black;margin-left:auto;margin-right:auto; width:370px;">WM Sohbet</p>
</body>
</html>



