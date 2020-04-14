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
  <?php
  include("db_config.php");
  if(isset($_GET["id"])){
	  if(isset($_SESSION["oturum"]))
	  {
		  $id=$_GET['id'];
		 $sorgu = $db->prepare("SELECT * FROM makale WHERE id=?");
		 $sorgu->execute(array($id));
		if($sorgu->rowCount()>0)
		{
			$row=$sorgu->fetch();
			
			}
			else 
	  	  header("location:index.php");
		  
		  }
	  else
	  	  header("location:index.php");
	  }
	  else
	  header("location:index.php");
  ?>
    <form id="form1" name="form1" method="post" action="">
      <table width="200" border="0">
        <tbody>
          <tr>
            <td colspan="2"><strong>MAKALE DÜZENLE</strong></td>
          </tr>
          <tr>
            <td>BAŞLIK</td>
            <td><input name="baslik" type="text" id="baslik" size="40" value="<?php echo $row['baslik'];?>"></td>
          </tr>
		  <tr>
            <td>AÇIKLAMA</td>
            <td><textarea name="aciklama" cols="40" rows="5" id="aciklama"><?php echo $row['aciklama'];?></textarea></td>
          </tr>
          <tr>
            <td>İÇERİK</td>
            <td><textarea name="icerik" cols="40" rows="5" id="icerik"><?php echo $row['icerik'];?></textarea></td>
          </tr>
		   
          <tr>
            <td>YAZAR</td>
            <td><input type="text" name="yazar" id="yazar" value="<?php echo $row['yazar'];?>"></td>
          </tr>
          <tr>
            <td>TARİH</td>
            <td><input type="date" name="tarih" id="tarih" value="<?php echo $row['tarih'];?>"></td>
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

if($_POST)
{
$aciklama=$_POST['aciklama'];
$baslik=$_POST['baslik'];
$icerik=$_POST['icerik'];
$yazar=$_POST['yazar'];
$tarih=$_POST['tarih'];
$sorgu=$db->prepare("UPDATE makale SET baslik=?,icerik=?,aciklama=?,yazar=?,tarih=? WHERE id=?");

if(isset($_SESSION["oturum"])) {
$sonuc=$sorgu->execute(array($baslik,$icerik,$aciklama,$yazar,$tarih,$id));

if($sorgu) echo $sorgu->rowCount()." kayıt başarıyla düzenlendi";
else echo "düzenleme başarısız";
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
