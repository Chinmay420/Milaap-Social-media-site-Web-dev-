<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    header("Location:index.php");
}
require("encryption.php");
$objCrypt=new Cryptography();
$poster1=$objCrypt->decryptdata($_SESSION['user']);
$poster2=rtrim($poster1,"\0");
$poster3=$objCrypt->decryptdata($_SESSION['user2']);
$poster4=rtrim($poster3,"\0");
$poster=$poster2." ".$poster4;
$storyid=$_GET['id'];
$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
            $tb1_name="comments";
            $con=mysqli_connect("$host","$username","$password","$db_name");
                    if($con->connect_errno){
                        echo "Connection problems".$con->connect_error;
                    }
            if(isset($_POST['comment'])){
            $comment=$_POST['comment'];
            $profile=$_SESSION['profile'];
            $query="insert into $tb1_name(poster,storyid,comment,posterpic) values('$poster','$storyid','$comment','$profile')";
            if($result=$con->query($query)){
               header("Location:success.php?r=".$_SESSION['remember']);   
            }
            else echo "error";
            
        }
        $c=0;
        $queryi="select * from $tb1_name where storyid='$storyid'";
							if($resulti=$con->query($queryi)){
								while( $rowi=$resulti->fetch_array(MYSQLI_NUM)){
									$c=$c+1;
							}	}	
echo "<html>
<head>
<title>
	Comments section
</title>
<link rel='stylesheet' href='css/bootstrap.min.css' >

<link rel='stylesheet' href='css/bootstrap-theme.min.css'>
</head>
<body>
<div class='container'>
<div class='row' >
<div style='background-color:cornflowerblue;padding-top:1px'>
<center>
<h1>".$c." "." comments so far</h1>
</center>
<br>
</div>
<div class='col-xs-12 col-lg-6 col-lg-push-3'> 
<br>";
$queryi="select * from $tb1_name where storyid='$storyid'";
							if($resulti=$con->query($queryi)){
								while( $rowi=$resulti->fetch_array(MYSQLI_NUM)){
									echo "<img src='/upload/".$rowi[4]."' alt='' height='50px' width='50px' class='img-circle'/>";
									 echo $rowi[1].": ".$rowi[3]."<br>";
									 
								}
							}
echo "
<form method='post' action='' >
<br><input type='text' class='form-control' placeholder='Comment' name='comment'  id='comment' />
</form>
</div>
</div>
</div>
<script src='js/jquery.min.js'></script>   
<script src='js/bootstrap.min.js'></script>
</body>
</html>";
?>