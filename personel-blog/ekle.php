<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BLOG</title>
<meta name="description" content="blog sayfası">
<link rel="stylesheet" type="text/css" href="style.css" media="screen">

<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<header>
  <h1>AHMET ÖZCAN'IN BLOG SAYFASI</h1>
  <h2>Bilişim dünyası</h2>
</header>
<section>
  <article>
    <form id="form1" name="form1" method="post" action="">
      <table width="200" border="0">
        <tbody>
          <tr>
            <td colspan="2"><strong>MAKALE KAYIT</strong></td>
          </tr>
          <tr>
            <td>BAŞLIK</td>
            <td><input name="baslik" type="text" id="baslik" size="40"></td>
          </tr>
		  <tr>
            <td>AÇIKLAMA</td>
            <td><textarea name="aciklama" cols="40" rows="5" id="aciklama"></textarea></td>
          </tr>
		  
          <tr>
            <td>İÇERİK</td>
            <td><textarea name="icerik" cols="40" rows="5" id="icerik"></textarea></td>
          </tr>
          <tr>
            <td>YAZAR</td>
            <td><input type="text" name="yazar" id="yazar" value="<?php if(isset($_SESSION["ad"])) echo $_SESSION["ad"]; ?>"></td>
          </tr>
          <tr>
            <td>TARİH</td>
            <td><input type="date" name="tarih" id="tarih"></td>
          </tr>
        <td>&nbsp;</td>
          <td><input type="submit" name="submit" id="submit" value="KAYDET"></td>
        </tr>
          </tbody>
        
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </form>
    <?php
include("db_config.php");
if($_POST)
{
$baslik=$_POST['baslik'];
$aciklama=$_POST['aciklama'];
$icerik=$_POST['icerik'];
$yazar=$_POST['yazar'];
$tarih=$_POST['tarih'];
$sorgu=$db->prepare("INSERT INTO makale(baslik,icerik,aciklama,yazar,tarih) VALUES(?,?,?,?,?)");

if(isset($_SESSION["oturum"])) {
$sonuc=$sorgu->execute(array($baslik,$icerik,$aciklama,$yazar,$tarih));

if($sorgu) echo $sorgu->rowCount()." kayıt başarıyla eklendi";
else echo "kayıt ekleme başarısız";
}
}
echo "<br><a href=index.php>GİRİŞ SAYFASI</a>";
?>
  </article>
  <aside> </aside>
</section>
<footer>
  <p>TUZLA MESLEKİ VE TEKNİK ANADOLU LİSESİ &copy; 2016</p>
</footer>
<!-- Free template created by http://freehtml5templates.com -->
</body>
</html>
