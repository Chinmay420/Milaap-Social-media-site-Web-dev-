<?php
session_start();
echo '<html>
	<head>
        <meta charset="utf-8"/>
        <title>
            Messages
        </title>
<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/main.css">
    </head>
<body style="background-color:aliceblue">
	<div class="container">
<h1 align="center" style="background-color:#3399FF;font-size:300%">Messages</h1><br></br>';
if(isset($_SESSION['loggedin']))
{
$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
$tb1_name="user";
$tb2_name="friends";
        $con=mysqli_connect("$host","$username","$password","$db_name");
        if($con->connect_errno){
            echo "Connection problems".$con->connect_error;
		}
		$user=$_SESSION['user'];
		$user2=$_SESSION['user2'];
		$id=$_SESSION['identity'];
		$query1="SELECT * FROM $tb1_name WHERE iD IN(SELECT receiver from $tb2_name where sender='$id' and accept='1')";
		$query2="SELECT * FROM $tb1_name WHERE iD IN(SELECT sender from $tb2_name where receiver='$id' and accept='1')";
		if($result2=$con->query($query2)){
			if($result2->num_rows>0){
				while($row=$result2->fetch_array(MYSQLI_NUM))
					{
						$margin="center";
						$font="125%";
						echo'<div id="ech3" align="'.$margin.'"><table style="align:'
						.$margin.'"><tr><td style="font-size:'
						.$font.'"align="'.$margin.'">'.$row[1].'</td>
						<td style="font-size:'
						.$font.'" align="'.$margin.'">'
						.$row[2].' : '.
						'</td>'.'  '.'<td align="'.$margin.'">';
						echo '<a class="btn btn-success" href="text1.php?receiver='.$row[0].'&name='.$row[1].' '.$row[2].'">Text</a></td></tr></table><br></div>';
					}
			}
		}
		
		if($result1=$con->query($query1)){
		if($result1->num_rows>0){
		while($row=$result1->fetch_array(MYSQLI_NUM))
		{
			$margin="center";
			$font="125%";
			echo'<div id="ech3" align="'.$margin.'"><table style="align:'
			.$margin.'"><tr><td style="font-size:'
			.$font.'"align="'.$margin.'">'.$row[1].'</td>
			<td style="font-size:'
			.$font.'" align="'.$margin.'">'
			.$row[2].' : '.
			'</td>'.'   '.'<td align="'.$margin.'">'.'  '.'<a class="btn btn-success" href="text1.php?receiver='.$row[0].'&name='.$row[1].' '.$row[2].'">Text</a></td></tr></table><br></div>';
		}
		
    }
    else{
		echo '<br><center></center>';
		exit;
	}
		
		
}
else{
	echo $con->error;
}
echo '<center><a class="btn btn-danger" href="success.php?username='.$user.' '.$user2.'&id='.$id.'">Back</a></center>';
if(isset($_GET['msg1']))
	echo '<center>'.$_GET['msg1'].'</center>';
}
echo '</div>
 <script src="js/jquery.min.js"></script>   
        <script src="js/bootstrap.min.js" ></script>
 </body>
 </html>';
?>