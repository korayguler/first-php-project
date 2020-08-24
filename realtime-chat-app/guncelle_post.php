<?php
include "ayar.php";
require_once 'ayar.php';
error_reporting(0);
if($_POST)
{
$id=$_POST['id'];
$ad=$_POST['ad'];
$tur=$_POST['tur'];
$yayinevi=$_POST['yayinevi'];
$yazar=$_POST['yazar'];
$yil=$_POST['yil'];
$sorgu=$baglan->prepare("UPDATE kitaplar SET ad=?,tur=?,yayinevi=?,yazar=?,yil=? WHERE id=?");

$sonuc=$sorgu->execute(array($id,$ad,$tur,$yayinevi,$yazar,$yil));
if($sorgu) echo $sorgu->rowCount()."<script>alert(' Kaydınız Güncellenmiştir...')</script>";
else echo "<script>alert(' Kayıt Güncellenemedi...')</script>";
header("refresh:2;url=guncelle.php");
}

?>


<table border="1px solid">
<form name="form1" method="post" action="">
 <tr> <p>KAYIT EKLEME</p></tr>
 <tr>
   <td> <label for="ad">Kitap Adı:</label></td>
   <td> <input type="text" name="ad" id="ad" required value="<?php echo $_GET['ad']?>"></td>
</tr>
  <tr>
   <td> <label for="tur">Tür:</label> </td>
   <td> <input type="text" name="tur" id="tur" required value="<?php echo $_GET['tur']?>"></td>
  </tr>
  <tr>
   <td> <label for="yayinevi">Yayınevi:</label></td>
    <td><input type="text" name="yayinevi" id="yayinevi" required value="<?php echo $_GET['yayinevi']?>"></td>
  </tr>
  <tr>
    <td><label for="yazar">Yazar:</label></td>
    <td><input type="text" name="yazar" id="yazar" required value="<?php echo $_GET['yazar']?>"></td>
 </tr>
  <tr>
    <td><label for="yil">Yıl:</label></td>
    <td><input type="text" name="yil" id="yil" required value="<?php echo $_GET['yil']?>"></td>
 </tr>
 <tr>
 <td>
    <input type="submit" name="submit"  value="Kaydet">
  </td>
  </tr>
</form>
</table>
<br/><a href="index.php">ANASAYFA</a>
