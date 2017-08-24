<?php
session_start();
echo '<html>
	
	<head>
<title>
	Friend Requests
</title>
<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
    <body style="background-color:aliceblue">
		<div class="container">
        <h1 align="center" style="background-color:#3399FF;font-size:300%">Friend Requests</h1><br></br>
<script type="text/javascript" src="scripts/jquery.js"></script>';
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
$b=0;
$id1=$objCrypt->decryptdata($_SESSION['identity']);
$id=rtrim($id1,"\0");
$query="select * from $tb1_name where receiver='$id' and accept='$b'";
if($result=$con->query($query)){
    if($result->num_rows>0){
        while($row=$result->fetch_array(MYSQLI_NUM)){
                if($row){
                    $sie="125%";
                    echo '<center><p id="ech" style="font-size:'.$sie.'">You have got a request from '.$row[2].'  ';
                    echo '<a class="btn btn-success" href="approve.php?id='.$row[1].'"  id="ech1">Accept</a>'.'  ';
					echo '<a class="btn btn-danger" href="decline.php?id='.$row[1].'"  id="ech2">Decline</a></p></center>';
                }
        }
    }
    else{
                $sie="125%";
                echo '<center><p style="font-size:'.$sie.'">No new requests</p></center>';
    }
}
    else
        echo 'error1';
		echo '<center><a  class="btn btn-danger" href="success.php?username='.$_SESSION['user'].' '.$_SESSION['user2'].'&id='.$_SESSION['identity'].'&r='.$_SESSION['remember'].'">Back</a></center>';
if(isset($_GET['msg2'])){
		echo '<center>'.$_GET['msg2'].'</center';
}
echo '</div>
<script src="js/jquery.min.js"></script>   
<script src="js/bootstrap.min.js" ></script>
    </body>
</html>';
?>