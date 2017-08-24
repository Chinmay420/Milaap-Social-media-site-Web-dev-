<?php
session_start();
echo '<html>
	<head>
		 <meta charset="utf-8"/>
        <title>
            Homepage
        </title>
		<link rel="stylesheet" href="css/bootstrap.min.css" >

		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/main.css">
	</head>
    <body>
        	<div class="container-fluid">
<div style="padding:0px 20px 0px 20px">
		<div class="row" style="background-color:#3399FF;padding-top:10px;padding-bottom:4px">
			<div class="col-lg-5" style="float:left">
				
				<img src="11.jpg" alt="" width="40px" height="40px" class="img-circle">
			</div>';
$user=$_GET['i'];
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
//$id1=$objCrypt->decryptdata($_SESSION['identity']);
//$id=rtrim($id1,"\0");
$query="select * from $tb1_name where iD='$user'";
if($result=$con->query($query)){
	$row=$result->fetch_array(MYSQLI_NUM);
    echo '<div class="col-lg-5">
                <h3>'.$row[1]." ".$row[2].'</h3>
                
            </div>
            <div class="col-lg-2">
                <a href="success.php?r='.$_SESSION['remember'].'" class="btn btn-primary">Stories</a>
            </div>
        </div>
        <br>
        <div class="row">
        	<div>
		<img src="upload/'.$row[8].'" alt="" title="" class="img-rounded "style="position:absolute; z-index:-1;padding-left:300px;padding-right:300px; width:100%; height:60%;"/>
            </div>
            <br><br><br><br><br><br><br><br><br><br>
        <center><img src="upload/'.$row[6].'" alt="" width="150px" height="150px" class="img-circle"></center>
        </div>
</div><br><br><br><br>';
   
    $posterpic=$row[6];
        $query1="select * from $tb2_name where poster='$user'";
        if($result1=$con->query($query1)){
            while($row1=$result1->fetch_array(MYSQLI_NUM)){
                echo "<div class='container' style='padding:0px 250px 0px 300px'> 
                      <div class='img-rounded' style='background-color:d3d3d3;padding:10px 5px 10px 20px'><div class='row'  ><div class='col-lg-1 col-lg-push-2'><img class='img-circle' src='upload/".$posterpic."' width='70px' height='60px' alt='profile'/></div>";
					echo "<div class='col-lg-7 col-lg-push-3'><div style='display:block'><b ><font color='cornflowerblue'>".$row1[2]."</font></b> has posted an update</div></div></div><br>";
					echo "<div class='row'><div class='col-lg-9 col-lg-push-2'> <b> ".$row1[3]."</b></div></div><br>";
					if($row1[4]=='blank'){
						continue;
					}
					else
					echo "<div class='row'><div class='col-lg-5 col-lg-push-2'><img src='upload1/".$row1[4]."'width='400px' height='350px' alt='story:".$row1[0]."'/></div></div></div></div><br>";
            }
        }
    }
echo '<script src="js/jquery.min.js"></script>   
<script src="js/bootstrap.min.js" ></script>
    </body>
</html>';
?>
