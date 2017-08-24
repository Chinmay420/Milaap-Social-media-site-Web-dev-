<?php
session_start();
$email=$_SESSION['Email'];
require("encryption.php");
$objCrypt=new Cryptography();
$email1=$objCrypt->decryptdata($email);
$email2=rtrim($email1,"\0");
require("logging.php");
if(session_destroy()){
	$objLog = new Log();
	$objLog->logs("Log out");
	if(isset($_GET['r'])){
		if($_GET['r']=='1')
			header("Location:index.php?s=".$email2);
	else
			header("Location:index.php");
}
}
?>