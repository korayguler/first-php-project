<?php require('db_config.php'); 

$id=$_GET['id'];
$stmt = $db->prepare('SELECT id, baslik, icerik, tarih FROM makale WHERE id=?');
$stmt->execute(array($id)); 
$row = $stmt->fetch();




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $row['baslik'];?></title>
    <link rel="stylesheet" href="style.css">
	
 
	<style>
	body{background:url(images/gray.jpg); }
	.go{
		text-decoration:none;color:red;
	}
	.go:hover{color:blue;}
	
	</style>
</head>
<body>

	<article>

		
		
		<h1><a href="./" class="go">Anasayfa</a></h1>
<?php echo '<p><b style="color:#2A2337;">Zaman :</b> <b style="color:#2372B2;">'.$row['tarih'].'</b></p>'; ?><hr>

		<?php	
			echo '<div>';
				echo '<h1 style="color:orange; text-shadow: 2px 1px 1px #000;">'.$row['baslik'].'</h1>';
				
				echo '<h3 style="color:#130D18">'.$row['icerik'].'</h3>';				
			echo '</div>';
			
		?>

	</article>



</body>
</html>