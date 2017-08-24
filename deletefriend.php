<?php
session_start();
$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
$tb1_name="friends";
$con=mysqli_connect("$host","$username","$password","$db_name");
if($con->connect_errno){
	echo "Connection problems".$con->connect_error;
}
$id1=$_GET['id'];
$id2=$_SESSION['identity'];
$query="update $tb1_name set accept='2' where (receiver='$id1' and sender='$id2')or (sender='$id1' and receiver='$id2')";
if($con->query($query)){
	if($con->affected_rows){
		header("Location:viewfriend.php?msg4=Blocked");
	}
	else
		echo $con->error;
}
?>