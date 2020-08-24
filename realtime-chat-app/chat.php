<?php
session_start();
include "ayar.php";

header("Content-type: text/html; charset=iso-8859-9");
if($_SESSION["oturum"]){


$tip =strip_tags($_POST["tip"]);


switch($tip){
	
	//Mesaj Gönderme
	case "gonder";
	$mesaj = iconv("UTF-8","ISO-8859-9",strip_tags(trim($_POST["mesaj"])));
	$kullanici = $_SESSION["uyeAdi"];
	$rutbe = $_SESSION["rutbe"];
	$tarih = date("H:i:s");
	
	if(empty($mesaj)){
		
		echo "bos";	
	}else{
	$ac =fopen ("chat.txt","ab");
	$eklenecekler = $tarih."\t".$kullanici."\t".$mesaj."\t".$rutbe."\n";
	$ekle = fwrite($ac,$eklenecekler);
	}
		
	break;
	
	//Sohbet Güncelle
	case "guncelle";  
	$dosya = file("chat.txt");
	if(empty($dosya)){
		echo "<div class='temizlendi'><strong class='tmz_yazi'>SOHBET TEMÝZLENDÝ KALDIÐIMIZ YERDEN DEVAM</stron></div>";	
	}else{
	$toplam = count($dosya);
	if($toplam >= 100){
		unlink("chat.txt");
		touch("chat.txt");
		echo "<div class='temizlendi'></div>";
		
	}else{
	
	 arsort($dosya); 
	     foreach($dosya as $mesaj){
		
		$bol = explode("\t",$mesaj);
		echo "<div class='sohbetMesaji'>
		<strong>";
		
		if ($bol[3] == 1){
			
			echo "<b><font color='#f63c25' class='simge1'>&#1758;</font></b>";
		}else if ($bol[3] == 2){
			echo"<font color='#FDB813' class='simge2'>&#10026; </font>";
			
		}else{echo"<font color='lightgreen' class='simge3'>&#9672; </font>";
			
		}
		echo"<span class='isim'>{$bol[1]} </span></strong><strong>: </strong><span class='yazi'>{$bol[2]}</span>
		
		</div>";
	}
	}
	}
	break;
	
	//Sohbet Temizle
	case "temizle";
	if($_SESSION["rutbe"] == 1){
		
		unlink("chat.txt");
		touch("chat.txt");
		echo "Sohbet Temizlendi..";
		
	}elseif($_SESSION["rutbe"] == 2){
			
		unlink("chat.txt");
		touch("chat.txt");
		echo "Sohbet Temizlendi..";
		
		
	}else{
		
		echo "Sen Yönetici veya Vip Deðilsin";
	}
	break;
	
}
}

?>