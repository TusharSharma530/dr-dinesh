<?php require_once 'database/db.php';
	session_destroy();
	echo "<script>window.location.href='{$path}manager/index.php';</script>";
 ?>