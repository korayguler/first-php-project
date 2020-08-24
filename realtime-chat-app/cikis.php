<?php
setcookie("oturum","",time()-360000);
session_start();
session_destroy();
header("Refresh:1;url=index.php");
?>