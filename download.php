<?php

$id = $_GET['id']; 
$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
$tb1_name="user";
$con=mysqli_connect("$host","$username","$password","$db_name");
if($con->connect_errno){
	echo "Connection problems".$con->connect_error;
} 
$query="SELECT * FROM $tb1_name WHERE iD='$id'";
if($result=$con->query($query)){
	
	$row=$result->fetch_array(MYSQLI_NUM);
 if($row){
header("Content-type: image/jpg");
echo $row[6];
 }
}

?>