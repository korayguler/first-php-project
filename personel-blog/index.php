<?php 
session_start();
include("db_config.php"); 
if(isset($_GET["oturumukapat"])) {session_destroy();header("location:index.php");}
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
<style>
body{background:url(images/blue.png)}
.link{text-decoration:none; color:#0872E4;}
.link:hover{color:skyblue;}
</style>
<header>
  <h1 style="color:white">Yazılım Dünyası</h1>
  <h2 style="color:white">BLOG</h2>
</header>
<section>
<article>

<?php
	$sorgu = $db->prepare("SELECT * FROM makale");
$sorgu->execute();

while($row=$sorgu->fetch()) {
	if(isset($_SESSION["oturum"])) {
		$duzenle=" <a href='duzenle.php?id=".$row['id']."'>[Düzenle]</a>";
		$duzenle.=" <a href='sil.php?id=".$row['id']."'>[Sil]</a>";
		}
	else
	$duzenle="";
echo "<div><header><h2 style='text-shadow: 3px 2px 1px #000;color:orange;'>".$row['baslik']."</h2> $duzenle</header>";     				
echo '<p>'.$row['aciklama'].'</p>';		
echo '<p><a class="link" href="goster.php?id='.$row['id'].'">Devamını Oku..</a></p>';		                                                   ///	
echo "<p class='alignleft'> Tarih:".$row['tarih']."</p>";
echo "<p class='alignright'> Yazar:".$row['yazar']."</p>";
echo "</div><div class='temizle'></div><hr>";
    }
echo 	"<br/> Toplamda <b>".$sorgu->rowCount()."</b> kayıt bulunmaktadır.";
//echo "<br><br><a href=index.php>GİRİŞ SAYFASI</a>";

?>
</article>
<aside align="center">
  <?php 
  if(!isset($_SESSION["oturum"])) {
  ?>
  <form id="form1" name="form1" method="post" action="">
    <h4>
      <label for="ad"> Kullanıcı Adı<br>
      </label>
      <input type="text" name="ad" id="ad">
    </h4>
    <h4>
      <label for="textfield2">Şifre<br>
      </label>
      <input type="password" name="sifre" id="sifre">
    </h4>
    <p>
      <input type="submit" name="submit" id="submit" value="Giriş">
    </p>
  </form>
  <?php 
  }
	else
	{echo "hoşgeldin ".$_SESSION["ad"]."<br>";
	echo "<a href=ekle.php>[Makale Ekle]</a><br>";
	echo "<a href=index.php?oturumukapat=1>Çıkış</a><hr>";
		}
			  if($_POST)
		{
				$ad=$_POST['ad'];$sifre=$_POST['sifre'];
				$sorgu=$db->prepare("SELECT * from uyeler WHERE ad=? AND sifre=?");
				$sonuc=$sorgu->execute(array($ad,$sifre));
				if($sorgu->rowCount()>0) 
				{
				$_SESSION["oturum"]="1";
				$_SESSION["ad"]=$ad;
				header("location:index.php");
				}
				else
				echo "<font color=red>giriş hatalı</font>";
			  
		}
		
		$sorgu = $db->prepare("SELECT * FROM admin");
$sorgu->execute();
while($row=$sorgu->fetch()) { 

echo "<br><b>Adım : <span style='color:red'>".$row['adi']."</span><br>";
echo "Yaşım : <span style='color:red'>".$row['yasi']."</span><br>";
echo "Mesleğim : <span style='color:red'>".$row['meslegi']."</span><br><br>";
echo "   <span style='color:red'>".$row['aciklama']."</span></B><br>";
echo'<br><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3018.850501204842!2d29.3032458!3d40.8312473!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x77cf122a4cea4983!2zxLBta2IgS2FtcMO8c8O8!5e0!3m2!1str!2str!4v1464116062222" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>';}
		
		?>
		
</aside>
</section>
<footer>
  <p>TUZLA MESLEKİ VE TEKNİK ANADOLU LİSESİ &copy; 2016</p>
</footer>

</body>
</html>
