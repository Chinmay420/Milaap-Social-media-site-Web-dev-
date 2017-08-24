<?php session_start();
echo '<html>
    <head>
        <meta charset="utf-8"/>
        <title>
            Edit data
        </title>
<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/main.css">
    </head>
<body style="background-color:aliceblue">';
if(!isset($_SESSION['loggedin'])){
	header("Location:index.php");
}
require("encryption.php");
$objCrypt=new Cryptography();
require("logging.php");
$id=$_GET['id'];

$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
$tb1_name="user";
$con=mysqli_connect("$host","$username","$password","$db_name");
$row="";
if($con->connect_errno){
	echo "Connection problems".$con->connect_error;
} 
$query="SELECT * FROM $tb1_name where iD='$id'";
if($result=$con->query($query)){
	
	if($result->num_rows>0){
		$row=$result->fetch_object();
		$objLog = new Log();
		$objLog->logs("edited");
	}
	else{
		echo"<br>Error1";
		exit;
	}
}
else{
	echo "<br>Error2";
	exit;
}
echo '<div align="center" style="font-size:125%">
	<div class="container">
<h1 style="background-color:#3399FF;font-size:300%">Edit personal info</h1> 
<form method="post" action="editUser.php" enctype="multipart/form-data" style="padding:0px 100px 0px 100px;font-size:125%">
Profile pic
<input type="file" name="image" id="image"  style="margin-left:80px" ><br>
Cover pic
<input type="file" name="image1" id="image1"  style="margin-left:80px" ><br><br>
First Name:
<input type="text" class="form-control" name="fName" value="';
echo $row->fName;
echo '"/><br></br>
Last Name:
<input type="text" name="lName" class="form-control" value="';
echo $row->lName;
echo '"/><br></br>
Email                  :  
<input type="text" name="Email" class="form-control"form-control value="';
echo $row->emailID;
echo '"/><br></br>
<input type="hidden" name="id" value="';
echo $row->iD;
echo '"/>
<input class="btn btn-info" type="submit"/>
</form>
<a href="success.php" class="btn btn-danger">Back</a>
</div>
	</div>
    <script src="js/jquery2.0.js"></script>   
        <script src="js/bootstrap.min.js" ></script>
</html>
</body>';
?>
