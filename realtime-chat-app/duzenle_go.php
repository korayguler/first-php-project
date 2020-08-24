<?php include "ayar.php";
    if($_POST)
    {
		
	$id=$oku['id'];
	$k_adi=$oku['uyeAdi'];
	$e_mail=$oku['email'];
	$rutbe=$oku['rutbe'];
	$chatyapabilme=$oku['chatYapabilme'];
        $kontrol=mysql_query("Update uyeler set id='".$id."', uyeAdi='".$k_adi."', email='".$e_mail."', rutbe='".$rutbe."', chatYapabilme='".$chatYapabilme."'"); 
        if($kontrol)
        {
            header("location:admin.php");
        }
        else
        {	
            echo "HATA";
        }
    }


?>