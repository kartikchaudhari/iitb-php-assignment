<?php 
	session_start();
	//unset($_SESSION['user']);
	//unset($_SESSION['amnt']);
	session_destroy();
	header("location:login.php");
?>