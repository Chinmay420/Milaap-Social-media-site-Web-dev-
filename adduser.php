<?php
$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
$tb1_name="user";
$con=mysqli_connect("$host","$username","$password","$db_name");
if($con->connect_errno){
	echo "Connection problems".$con->connect_error;
}
if(isset($_POST['male'])){
	$sex="Male";
}
if(isset($_POST['female'])){
	$sex="Female";
}
if($stat=$con->prepare("INSERT INTO user (fName,lName,emailID,pAssword,Sex) VALUES(?,?,?,?,?)")){
	$stat->bind_param('sssss',$fName,$lName,$emailID,$pAssword,$sex);
	$fName=$_POST['fName'];
	$lName=$_POST['lName'];
	$emailID=$_POST['email'];
	$pAssword=$_POST['password'];
	if($stat->execute()){
		if($stat->affected_rows)
			header("Location:index.php?message=You have successfully signed up.Log in to continue.");
		else
			echo "Error";
	}
	else	
		echo $con->error;
	$stat->close();
	$con->close();
}
?>

