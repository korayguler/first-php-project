
<?php  

include "ayar.php";
$bul =mysql_query("SELECT * FROM uyeler"); 
$tkayits = mysql_num_rows($bul);
echo "Toplam <strong>{$tkayits}</strong> Kullanıcımız Var.";

?>