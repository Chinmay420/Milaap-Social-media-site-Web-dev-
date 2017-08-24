<?php
/*session_start();
if(!isset($_GET['loggedin'])){
	header("Location:index.php");
}*/
$id=$_REQUEST['id'];
$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
$tb1_name="user";
$con=mysqli_connect("$host","$username","$password","$db_name");
if($con->connect_errno){
	echo "Connection problems".$con->connect_error;
}  
$query="Delete from $tb1_name where iD=$id";
if($con->query($query)==TRUE){
	if($con->affected_rows)
		header("Location:viewallusers.php?msg='Account deleted'");
	else
		$con->error;
}
else
	echo $con->error;
?>