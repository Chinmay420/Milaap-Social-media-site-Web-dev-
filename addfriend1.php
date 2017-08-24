<?php
session_start();
if(!isset($_SESSION['loggedin'])){
	header("Location:index.php");
}
 require("encryption.php");
    $objCrypt=new Cryptography();
$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
$tb1_name="friends";
$con=mysqli_connect("$host","$username","$password","$db_name");
if($con->connect_errno){
	echo "Connection problems".$con->connect_error;
}
$receiver=$_GET['receiver'];
$receivername=$_GET['name'];
if(isset($_SESSION['identity'])){
    //echo "stuff";
$sender1=$objCrypt->decryptdata($_SESSION['identity']);
$sender=rtrim($sender1,"\0");
}
$sendername1=$objCrypt->decryptdata($_SESSION['user'])." ".$objCrypt->decryptdata($_SESSION['user2']);
$sendername=rtrim($sendername1,"\0");
$query="insert into $tb1_name(sender,sendername,receiver,receivername) values('".$sender."','".$sendername."','".$receiver."','".$receivername."')";
if($result=$con->query($query)){
    header("Location:addfriend.php?msg1=Friend request sent");
}
else
echo 'Error';
?>