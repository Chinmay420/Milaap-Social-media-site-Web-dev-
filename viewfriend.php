<?php
session_start();
echo '<html>

	<head>
<title>
	Login
</title>
<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
	<body style="background-color:aliceblue">
		<div class="container">
<h1 align="center" style="background-color:#3399FF;font-size:300%;font-family: cursive">Friends</h1><br></br>';
if(!isset($_SESSION['loggedin'])){
	header("Location:index.php");
}
 require("encryption.php");
    $objCrypt=new Cryptography();
$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
$tb1_name="friends";
$con=mysqli_connect("$host","$username","$password","$db_name");
if($con->connect_errno){
	echo "Connection problems".$con->connect_error;
}
$iD1=$objCrypt->decryptdata($_SESSION['identity']);
$iD=rtrim($iD1,"\0");
$query="select * from $tb1_name where accept='1'";
if($result=$con->query($query)){
    if($result->num_rows>0){
        while($row=$result->fetch_array(MYSQLI_NUM)){
            if($row[3]==$iD){
                $sie="125%";
                echo '<center><p style="font-size:'.$sie.'">'.$row[2].'  '.'<a class="btn btn-danger" href="deletefriend.php?id='.$row[1].'">Block</a></p></center><br>';
            }
            elseif($row[1]==$iD){
                $sie="125%";
                echo '<center><p style="font-size:'.$sie.'">'.$row[4].'<a class="btn btn-danger" href="deletefriend.php?id='.$row[3].'">Block</a></p></center><br>';
            }
			
        }
    }
}
echo '<center><a class="btn btn-danger" href="success.php?id='.$_SESSION['identity'].'&username='.$_SESSION['user'].' '.$_SESSION['user2'].'&r='.$_SESSION['remember'].'">Back</a></center>';
if(isset($_GET['msg4']))
echo '<center>'.$_GET['msg4'].'</center>';
echo '</div>
<script src="js/jquery.min.js"></script>   
<script src="js/bootstrap.min.js" ></script>
</body>
</html>';
?>
