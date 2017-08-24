<?php session_start();
echo '<html>
	<head>
        <meta charset="utf-8"/>
        <title>
            View
        </title>
<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/main.css">
    </head>
<body style="background-color:aliceblue">
	<div class="container">
<h1 style="background-color:#3399FF;font-size:300%" align="center">Search Friends</h1>';?>
<?php
if(!isset($_SESSION['loggedin'])){
	header("Location:index.php");
}
$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
$tb1_name="user";
$con=mysqli_connect("$host","$username","$password","$db_name");
if($con->connect_errno){
	echo "Connection problems".$con->connect_error;
} 
$query="SELECT * FROM $tb1_name";
if($result=$con->query($query)){
	if($result->num_rows>0){
		while($row=$result->fetch_array(MYSQLI_NUM))
		{
			$margin="center";
			$font="125%";
			echo'<div align="'.$margin.'"><table style="align:'
			.$margin.'"><tr><td style="font-size:'
			.$font.'"align="'.$margin.'">'.$row[1].'</td>
			<td style="font-size:'
			.$font.'" align="'.$margin.'">'
			.$row[2].
			'</td><td align="'.$margin.'">';
			if($_SESSION['Role']==2){
			echo '<a class="btn btn-info" href="edituserform.php?id='.$row[0].'">Edit</a></td><td><a class="btn btn-danger" href="deleteUser.php?id='.$row[0].'">Delete</a></td></tr></table><br></div>';
			}
			else{
				echo '<a class="btn btn-info" href="edituserform.php?id='.$row[0].'"> Edit</a></td></tr></table><br></div>';
			}
		}
		$margi="center";
		echo '<div style="text-align:'.$margi.'"><a class="btn btn-danger" href="success.php?username='.$_SESSION['user'].' '.$_SESSION['user2'].'&id='.$row[0].'&r='.$_SESSION['remember'].'">Back</a></div>';
	}
	else{
		echo '<br>Error';
		exit;
	}
	
}
else{
	echo '<br>Error';
	exit;
}
?>
<?php
if(isset($_GET['msg'])){
	$align="center";
	echo '<p style="text-align:'.$align.'">'.$_GET['msg'].'</p>';
}
echo '</div>
<script src="js/jquery2.0.js"></script>   
<script src="js/bootstrap.min.js" ></script>
</body>
</html>';
?>
