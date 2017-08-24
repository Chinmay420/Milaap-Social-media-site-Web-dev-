<?php
session_start();
if(isset($_SESSION['loggedin'])){
	if(isset($_SESSION['user']))
	/*$host="localhost";
	$username="root";
	$password="@WES0METRUT#";
	$db_name="php";
	$tb1_name="user";
	$con=mysqli_connect("$host","$username","$password","$db_name");
	if($con->connect_errno){
		echo "Connection problems".$con->connect_error;
}
	
	$user=$objCrypt->decryptdata($_SESSION['Email']);
	$email=rtrim($user,"\0");
	$query="select * from $tb1_name where emailID='$email'";
	if($result=$con->query($query)){
	
	$row=$result->fetch_array(MYSQLI_NUM);
	if($row){*/
	header("Location:success.php?r=".$_SESSION['remember']);
//}
	}
if(isset($_POST["login"]))
{	
	require("logging.php");
	$objLog = new Log();
	$objLog->logs("Log in");
	
}

?>
<html>
<head>
<title>
	Login
</title>
<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>
	<div>
		<img src="10.jpg" alt="" title="" style="position:absolute; z-index:-1; width:100%; height:100%;"/>
	</div>
	<div class="container">
<div class="login">
	<div class="row" >
		<div class="col-xs-1" style="padding:18px 0px 0px 0px">
			<img src="11.jpg" alt="" class="img-circle" width=50px height=50px>
		</div>
		<div class="col-xs-11" >
<h1 style="font-size:150%;float:right" class="btn btn-info" ><b>Welcome</b></h1></div></div>
	<br>
	<div class="row">
		<div class="col-xs-5">
			
		
<div style="display:inline;">
	<p style="font-size:200%;padding:10px 0px 0px 60px" ><font color="cornflowerblue">Connect with people</font></p>
	<div style="padding:0px 80px 0px 50px">
<form method="post" action="login.php">
<table style="" padding="50px">
<tr style="font-size:110%">
<td style="font-size:110%"><font color="cornflowerblue">Email:</font></td>
<td><input type="text" name="Email" class="form-control" style="background-color:transparent" placeholder="Enter your email id" value="<?php if(isset($_GET['s'])){echo $_GET['s'];} else echo ""; ?>"></td><br></br>
</tr>
<tr style="font-size:110%">
<td style="font-size:110%"> <font color="cornflowerblue">Password:</font></td>
<td><input type="password" name="Password" class="form-control" style="background-color:transparent" placeholder="Enter password"></td>
</tr>
<tr><td>
<div style="padding:0px 0px 0px 2px" >
<input type="checkbox" name="Remember"/><font color="cornflowerblue">Remember me</font></div></td></tr>
</table>


<div style="padding:0px 0px 0px 20px">
<p align="" ><input type="submit" class="" value="Login" name="login" style="font-size:140%;padding:0px 100px 0px 100px;background-color:transparent;color:cornflowerblue" ></p></div>
</form>
<p style="padding:0px 0px 0px 110px;font-size:150%"><font color="cornflowerblue">OR</font></p>
<p style="padding:0px 0px 0px 45px;font-size:150%"><font color="cornflowerblue">Create an account</font></p>
<form method="post" action="adduser2.php" style="padding:0px 0px 0px 90px;">
<input type="submit" name="submit" value="Sign up" class=""style="font-size:150%;padding:0px 10px 0px 10px;background-color:transparent;color:cornflowerblue"/><br>
</form>
	</div>
</div>
		</div>
<div class="col-xs-6 col-xs-push-2">
<img src="12.jpg" style="float:right" width="550px" height="400px" class=" img-circle" alt="connect" hspace="40"></div>
</div>
</div>
</div>
<script src="js/jquery.min.js"></script>   
<script src="js/bootstrap.min.js" ></script>

<?php
if(isset($_GET['message'])){
	$align="center";
	$sie="140%";
	$color="cornerflowerblue";
	echo '<br><br><center><p style="text-align:'.$align.';font-size:'.$sie.'"><font color="'.$color.'">'.$_GET['message'].'</font></p></center>';

}
/*if(isset($_GET['s'])){
	$s=$objCrypt->decryptdata($_GET['s']);
	echo $s;
}*/
?>
</body>
</html>