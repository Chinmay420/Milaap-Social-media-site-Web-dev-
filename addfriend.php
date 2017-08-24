<?php session_start();
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
<h1 style="background-color:#3399FF;font-size:300%" align="center">Search Friends</h1>';
if(!isset($_SESSION['loggedin'])){
	header("Location:index.php");
}
 require("encryption.php");
    $objCrypt=new Cryptography();
$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
$tb1_name='user';
$tb2_name='friends';
$con=mysqli_connect("$host","$username","$password","$db_name");
if($con->connect_errno){
	echo "Connection problems".$con->connect_error;
}
$id1=$objCrypt->decryptdata($_SESSION['identity']);
$id=rtrim($id1,"\0");
$query="SELECT * FROM $tb1_name WHERE iD NOT IN(SELECT receiver from $tb2_name where sender='$id')AND iD<>'$id'";
if($result=$con->query($query)){
	if($result->num_rows>0){
		while($row=$result->fetch_array(MYSQLI_NUM))
		{
			$margin="center";
			$font="125%";
			echo'<div id="ech3" align="'.$margin.'"><table style="align:'
			.$margin.'"><tr><td style="font-size:'
			.$font.'"align="'.$margin.'">'.$row[1].'</td>
			<td>'.'_'.'</td>
			<td style="font-size:'
			.$font.'" align="'.$margin.'">'
			.$row[2].
			'</td><td style="font-size:'
			.$font.'" align="'.$margin.'">';
            echo '<a  class="btn btn-success" href="addfriend1.php?receiver='.$row[0].'&name='.$row[1].' '.$row[2].'">Add</a></td></tr></table></div><br>';
        }
    }
    else{
		echo '<br>Error1';
		exit;
	}
	
}
else{
	echo '<br>Error2';
	exit;
}
echo '<center><a  class="btn btn-danger" href="success.php?username='.$_SESSION['user'].' '.$_SESSION['user2'].'&id='.$_SESSION['identity'].'&r='.$_SESSION['remember'].'">Back</a></center>';
if(isset($_GET['msg1'])){
    echo '<center>'.$_GET['msg1'].'</center>';
    $_GET['msg1']="";
}
echo '</div>
<script src="js/jquery.min.js"></script>   
<script src="js/bootstrap.min.js" ></script>
</body>
</html>';
?>
