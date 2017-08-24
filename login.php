<?php session_start();
if(isset($_POST['Remember'])){
	$remember='1';
}
else
	$remember='0';
?>
<?php
require("logging.php");
require("encryption.php");
   
$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
$tb1_name="user";
$con=mysqli_connect("$host","$username","$password","$db_name");
if($con->connect_errno){
	echo "Connection problems".$con->connect_error;
} 
$email=$_POST['Email'];
$password=$_POST['Password'];
//$email=mysqli_real_escape_string($email);
//$password=mysqli_real_escape_string($password);
if($email!=null && $password!=null){
$query="SELECT * FROM $tb1_name WHERE emailID='$email' and pAssword='$password'";
if($result=$con->query($query)){
	
	$row=$result->fetch_array(MYSQLI_NUM);
 if($row){
	$objCrypt=new Cryptography();
	$encryptfname=$objCrypt->encryptdata($row[1]);
	$encryptlname=$objCrypt->encryptdata($row[2]);
	$encryptid=$objCrypt->encryptdata($row[0]);
	$encryptemail=$objCrypt->encryptdata($row[3]);
	$_SESSION['Email']=$encryptemail;
	$_SESSION['loggedin']=true; 
	$_SESSION['user']=$encryptfname;
	$_SESSION['Role']=$row[5];
	$_SESSION['identity']=$encryptid;
	$_SESSION['user2']=$encryptlname;
	$_SESSION['remember']=$remember;
	$_SESSION['profile']=$row[6];
	$objLog = new Log();
	$objLog->logs("Log in");
	header("Location:success.php?r=".$remember);
}
else{
	
	$objLog = new Log();
	$objLog->logs("Invalid log in attempt");
	header("Location:index.php?message=Invalid login details");
}
}
}
else{
	header("Location:index.php?message=Invalid login details");
}
?>
