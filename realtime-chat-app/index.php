<?php include "ayar.php"; session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="img/ico.png"/>
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="style.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<script language="javascript" type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.5.2.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
    //açılışta çalışması için
    sohbetGuncelle();
    //her 0.1 saniyede bir yenile
    var int=self.setInterval("sohbetGuncelle()",100);
});



document.onkeydown = mesajGonder;
function mesajGonder(x){
	var tus;
	if(window.event){
		tus = window.event.keyCode;
	}else if(x){
		
		tus = x.which;
	}
	
	if(tus == 13){
		$("textarea[name=mesaj]").attr("disabled","disabled");
		var mesaj = $("textarea[name=mesaj]").val();
		$.ajax({
		    type: "POST",
			url: "chat.php",
			data:{"tip":"gonder","mesaj":mesaj},
			success: function(sonuc){
				if(sonuc == "bos"){
					alert("Lütfen Boş Mesaj Göndermeyiniz..");
					$("textarea[name=mesaj]").removeAttr("disabled");
				}else{
					$("textarea[name=mesaj]").removeAttr("disabled");
					$("textarea[name=mesaj]").val("");
					sohbetGuncelle();
					$("textarea[name=mesaj]").focus();
				}
			}		
		});	
	}
}
	function sohbetGuncelle(){
		
		$.ajax({
			type: "POST",
			url: "chat.php",
			data: {"tip":"guncelle"},
			success: function(sonuc){
				$("#SohbetIcerik").html(sonuc);
			}
			
		});	
	}
	
	function sohbetTemizle(){
		$.ajax({
			type: "POST",
			url: "chat.php",
			data:{"tip":"temizle"},
			success:function(sonuc){
				alert(sonuc);
				
			}
			
		});
		
		
		
	}
		
</script>
<title>WM Sohbet</title>
</head>
<body>
<?php if(isset($_SESSION["oturum"])){ ?>
<div id="SohbetGenel">

<div id="SohbetIcerik">
</div>

<div id="UstBilgi">
<a type="submit" class="cikis" href="cikis.php">Çıkış Yap</a>
<?php if(isset($_SESSION["rutbe"])==1 or isset($_SESSION["rutbe"])==2) { ?>
<div class="sohbetTemizle">
<?php
if(isset($_SESSION["rutbe"])==1){echo'
<a href="admin" target="_new" <span class="bttemizle">Panel</span></a>';} ?>
<a href="javascript:void(0)" onclick="sohbetTemizle()"><span class="bttemizle">Temizle</span></a>
</div>
<?php } ?>

</div>




<div id="MesajGonder">
<textarea rows="0" cols="0" name="mesaj" placeholder="Mesaj Yaz..."></textarea>
</div>
</div>
<?php 

}else {
	
if($_POST){
	$uyeAdi = htmlentities(mysql_real_escape_string($_POST["kadi"]));
	$sifre = md5(md5(htmlentities(mysql_real_escape_string($_POST["sifre"]))));
	
echo  '<br/><div id="giris">';	
$bul = mysql_query("select * from uyeler where uyeAdi='$uyeAdi' && sifre='$sifre'");
$say = mysql_num_rows($bul);
if ($say > 0){
	$goster =mysql_fetch_array($bul);
	$_SESSION["oturum"] = true;
	$_SESSION["uyeAdi"] = $uyeAdi;
	$_SESSION["rutbe"] = $goster["rutbe"];
	header("Location:index.php");	
}else{
	
	echo '<div class="basarisiz"><center><br/><br/><b><font size=5px; class="tekrar">GİRİŞ BAŞARISIZ.</font></b></center>
	<img class="img_2" src="img/error.gif"><br/>  <p size:2px; class="tekrar"><b>                 Tekrar Deneyiniz.</b></p>
	
	</div>';
	header("Refresh: 3;url=index.php");	
	
	
}
	

echo '</div>';

}else{






?>
<br/>
<div id="giris">
<form action="" method="post">

<span><input type="text" name="kadi" class="input_1" placeholder="Kullanıcı Adı"/></span> 
<input type="password" name="sifre" class="input_2"placeholder="Şifre"/></span>
<span><input type="submit" class="submit_" value="Giriş Yap" /></span>
<span><a href="kayit.php" class="submit_1">Kayıt Ol</a></span>
</form>
<img class="img_" src="img/bat.gif" >
</div>



<p style="font-size:80px;font-family: 'Lobster', cursive; color:white;text-shadow:5px 5px 5px black;margin-left:auto;margin-right:auto; width:370px;">WM Sohbet</p>



<?php } }?>
</body>
</html>