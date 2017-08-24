<?php
session_start();
require("encryption.php");
$objCrypt=new Cryptography();
$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
$tb1_name="user";
$tb2_name="stories";
$tb3_name="friends";
$con=mysqli_connect("$host","$username","$password","$db_name");
if($con->connect_errno){
    echo "Connection problems".$con->connect_error;
					   }
		$search=$_POST['search-text'];
		$name=$objCrypt->decryptdata($_SESSION['user']);
		$user1=rtrim($name,"\0");
		$name1=$objCrypt->decryptdata($_SESSION['user2']);
		$user2=rtrim($name1,"\0");
		$user=$user1." ".$user2;
		$query="select * from $tb1_name where fName like '%$search%' or lName like '%$search%'";
		if($result=$con->query($query)){
			while($row=$result->fetch_array(MYSQLI_NUM)){
				if($row){
					echo "<a href='profile.php?i=".$row[0]."'>".$row[1]." ".$row[2]."</a><br>";
					
			}
			else echo "error1";
			}
		}
		else echo "error2";

?>