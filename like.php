<?php
session_start();
require("encryption.php");
$objCrypt=new Cryptography();
$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
$tb1_name="stories";
$tb2_name="likes";
$con=mysqli_connect("$host","$username","$password","$db_name");
if($con->connect_errno){
    echo "Connection problems".$con->connect_error;
					   }
                       $poster=$_GET['poster'];
                       $text=$_GET['text'];
$storyid=$_GET['id'];
$like;
    $query1="select * from $tb1_name where poster='$poster' and storytext='$text'";
     if($result1=$con->query($query1)){
        $row=$result1->fetch_array(MYSQLI_NUM);
        
        $like=$row[5];
        
    }
	$liker=$objCrypt->decryptdata($_SESSION['identity']);
	$liker1=rtrim($liker,"\0");
	$likername1=$objCrypt->decryptdata($_SESSION['user']);
	$likername2=$objCrypt->decryptdata($_SESSION['user2']);
	$likername=$likername1." ".$likername2;
 $query3="SELECT * from $tb2_name where poster='$likername' and storyid='$storyid'";
	if($result3=$con->query($query3)){
		if($row1=$result3->fetch_array(MYSQLI_NUM)){
			 header("Location:success.php?r=".$_SESSION['remember']);
		}
		else{
			    $query2="insert into $tb2_name(posterid,poster,storyid) values('$liker','$likername','$storyid') ";
				$con->query($query2);
				$like1=$like+1;
				$query="update $tb1_name set like1='$like1' where (poster='$poster' and storytext='$text')";
				$con->query($query);
				header("Location:success.php?r=".$_SESSION['remember']);
		}
	}
	?>