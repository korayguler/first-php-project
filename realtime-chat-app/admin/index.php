<?php include "../ayar.php"; session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>WM Sohbet - Yönetim Paneli</title>
<link rel="shortcut icon" href="../img/ico.png"/>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<script language="javascript" type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.5.2.min.js"></script>

<style>
.duzen{text-decoration:none; color:white;}
.duzen:hover{color:red;}

</style>
</head>
<body>
<?php if($_SESSION["oturum"]){ ?>

<?php if($_SESSION["rutbe"]==1){ ?>

<div id="UstBilgi"> 
<a type="submit" class="cikis" href="../cikis.php">Çıkış Yap</a>
<a href="../index.php" target="_new" ><span class="bttemizle">Sohbet</span></a>
</div>
<div style="border-radius:3px;
			width:auto;
			height:auto;
			margin-left:25px;
			margin-bottom:20px;
			padding-top:2px;">
<!--//////////////////////////////////////////////////////////-->
<table class="admin" style="margin-top:34px;background-image:url(img/blc.png);
			margin-top:37px;
			margin-bottom:20px;
			border-radius:2px;
			padding:1px;
			">
  <tr align="left">
  <td width="50" style="color:#FFFF66; border-bottom:1px solid black;"><strong>ID</strong></td>
    <td width="250" style="color:#FFFF33;border-bottom:1px solid black;"><strong>Kullanıcılar</strong></td>
    <td width="350" style="color:#FFFF33;border-bottom:1px solid black;"><strong>Kullanıcı Mailleri</strong></td>
    <td width="450" style="color:#FFFF33;border-bottom:1px solid black;"><strong>Şifreler(md5)</strong></td>
	<td width="50" style="color:#F8FE00;border-bottom:1px solid black;"><strong>Rütbe</strong></td>
	<td width="50" style="color:#F8FE00;border-bottom:1px solid black;"><strong>Chat</strong></td>
	<td width="50" style="color:#FFF48B;border-bottom:1px solid black;"><strong>Yönetim</strong></td>
    
  </tr>

<?php

$sql=mysql_query("select * from uyeler");
while($oku=mysql_fetch_array($sql))
{	$id=$oku['id'];
	$k_adi=$oku['uyeAdi'];
	$e_mail=$oku['email'];
	$sifre=$oku['sifre'];
	$rutbe=$oku['rutbe'];
	$chatyapabilme=$oku['chatYapabilme'];

  echo '<tr align="left" >
	<td style="color:white;border-right:1px solid black;">'.$id.'</td>
    <td style="color:white;border-right:1px solid black;">'.$k_adi.'</td>
	<td style="color:white;border-right:1px solid black;">'.$e_mail.'</td>
	<td style="color:white;border-right:1px solid black;">'.$sifre.'</td>
    <td style="color:white;border-right:1px solid black;">'.$rutbe.'</td>
    <td style="color:white;border-right:1px solid black;">'.$chatyapabilme.'</td>
    <td><div align="center"><a class="duzen" href=../duzenle.php?id='.$id.'>Düzenle</a> | <a class="duzen"  href=../sil.php?id='.$id.'>Sil</a></div></td>
  </tr>';
}
?>

</table>

<!--//////////////////////////////////////////////////////////-->

</div>


<?php }else{echo"<script>alert('Siz Yönetici Değilsiniz...')</script>";header("Refresh:1;url=../index.php");} ?>



<?php }else{echo"<script>alert('Lütfen Oturum Açınız...')</script>";header("Refresh:1;url=../index.php");	} ?>
</body>
</html>
