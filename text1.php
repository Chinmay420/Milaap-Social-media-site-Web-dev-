<?php
session_start();
require("encryption.php");
$objCrypt=new Cryptography();
$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
$tb1_name="messages";
$con=mysqli_connect("$host","$username","$password","$db_name");
if($con->connect_errno){
	echo "Connection problems".$con->connect_error;
}
if(isset($_POST['text'])){
$receiver=$_GET['receiver'];
$output=$_GET['name'];
if(isset($_SESSION['identity'])){
$sender=$objCrypt->decryptdata($_SESSION['identity']);
}
$sendername=$objCrypt->decryptdata($_SESSION['user'])." ".$objCrypt->decryptdata($_SESSION['user2']);
$text=$_POST['text'];

$query1="insert into $tb1_name(sender,sendername,receiver,receivername,text) values('".$sender."','".$sendername."','".$receiver."','".$output."','".$text."')";
if($result=$con->query($query1)){
header("Location:text1.php?receiver=".$_GET['receiver']."&name=".$_GET['name'] );
}
$_POST['text']=NULL;
}
echo '<html>
	<head>
        <meta charset="utf-8"/>
        <title>
            Texts
        </title>
<link rel="stylesheet" href="css/bootstrap.min.css" >
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/main.css">
</head>
<div class="container">
<body style="background-color:aliceblue">';
echo '<h1 align="center" style="background-color:#3399FF;font-size:300%">Chat</h1><br></br>';
$sender;
$receiver=$_GET['receiver'];
$receivername=$_GET['name'];
if(isset($_SESSION['identity'])){  
$sender=$objCrypt->decryptdata($_SESSION['identity']);
$id4=rtrim($sender,"\0");
}
$sendername=$objCrypt->decryptdata($_SESSION['user'])." ".$objCrypt->decryptdata($_SESSION['user2']);
$query2="Select * from $tb1_name where (receiver='$receiver' and sender='$id4') or (receiver='$id4' and sender='$receiver')";
if($result=$con->query($query2)){
		if($result->num_rows>0){
		while($row=$result->fetch_array(MYSQLI_NUM))
		{
					
				echo '<center>'.$row[2].':  '.$row[5].'<br></center>';
			
		}
		}
}
echo '<center><form method="post" action="" align="center">
	<div class="row">
	<div class="col-xs-12 col-lg-6 col-lg-push-3">
<input type="text" name="text" class="form-control" placeholder="Enter text here" style="font-size: 110%"/>
<br><input class="btn btn-success" type="submit" name="submit" value="send" />
	</div>
	</div>
</form></center>';
$user=$_SESSION['user'];
$user2=$_SESSION['user2'];
$id=$_SESSION['identity'];
$remember=$_SESSION['remember'];
echo '<center><a class="btn btn-danger" href="success.php?username='.$user.' '.$user2.'&id='.$id.'&r='.$remember.'">Back</a></center>';

echo '<script src="js/jquery.min.js"></script>   
        <script src="js/bootstrap.min.js" ></script>
</body>
</div>
</html>';
?>