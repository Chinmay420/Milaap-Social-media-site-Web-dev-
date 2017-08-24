<?php
session_start();
	if(!isset($_SESSION['loggedin'])){
		header("Location:success.php?r=".$_SESSION['remember']);
	}
	require("encryption.php");
		$objCrypt=new Cryptography();
?>
<html>
	<head>
		 <meta charset="utf-8"/>
        <title>
            Homepage
        </title>
		<link rel="stylesheet" href="css/bootstrap.min.css" >

		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/main.css">
	</head>
<body style="background:aliceblue">
	<nav class="navbar navbar-fixed-top">
	<div class="container-fluid">
<div style="padding:0px 20px 0px 20px">
		<div class="row" style="background-color:#3399FF;padding-top:10px;padding-bottom:4px">
			<div class="col-lg-4" style="float:left">
				
				<img src="11.jpg" alt="" width="40px" height="40px" class="img-circle">
			</div>
			<div class="col-lg-3 ">
				<div><form method="post" action="search.php">
					<input type="text" name="search-text" class="form-control glyphicon" placeholder="Search" id="search" style="padding-top:8px">
				</form>
				</div>

	
			</div>
			<div class="col-lg-5 col-lg-push-2" style="float:right">
				<?php
					$identity1=$objCrypt->decryptdata($_SESSION['identity']);
					$identity2=rtrim($identity1,"\0");
				?>
				<a href="profile.php?i=<?php echo $identity2;?>" class="btn btn-primary">Home</a>
				<div class="dropdown" style="display:inline-block">
					<button class="btn btn-primary dropdown-toggle" type="button" id="main2" data-toggle="dropdown">
						Messages
					</button> 
					 <ul class="dropdown-menu" aria-labelled-by="main2">
						
							<?php
		 if(isset($_SESSION['loggedin']))
 {
		$email;
		
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
		$profile;
		$user=$objCrypt->decryptdata($_SESSION['user']);
		$user2=$objCrypt->decryptdata($_SESSION['user2']);
		$id=$objCrypt->decryptdata($_SESSION['identity']);
		
		
		$query1="SELECT * FROM $tb1_name WHERE iD IN(SELECT receiver from $tb3_name where sender='$id' and accept='1')";
		$query2="SELECT * FROM $tb1_name WHERE iD IN(SELECT sender from $tb3_name where receiver='$id' and accept='1')";
		if($result2=$con->query($query2)){
			if($result2->num_rows>0){
				while($row=$result2->fetch_array(MYSQLI_NUM))
					{
						/*$name=$objCrypt->encryptdata($row[1]);
						$name2=$objCrypt->encryptdata($row[2]);
						$id2=$objCrypt->encryptdata($row[0]);*/
						echo '<li><a class="btn btn-primary" href="text1.php?receiver='.$row[0].'&name='.$row[1].' '.$row[2].'">'.$row[1].' '.$row[2].'</a></li>';
					}
			}
		}
		
		if($result1=$con->query($query1)){
		if($result1->num_rows>0){
		while($row=$result1->fetch_array(MYSQLI_NUM))
		{
			echo '<li><a class="btn btn-primary" href="text1.php?receiver='.$row[0].'&name='.$row[1].' '.$row[2].'">'.$row[1].' '.$row[2].'</a></li>';
			
			
		}
		
    }
		}
	?>
						
					 </ul>
				</div>
				<div class="dropdown" style="display:inline-block">
					 <button class="btn btn-primary dropdown-toggle" type="button" id="main" data-toggle="dropdown">
                            Friend List
					 </button>
					 <ul class="dropdown-menu" aria-labelled-by="main">
				<li><a class="btn btn-primary" href="viewfriend.php?">Friends</a></li>
				<li><a class="btn btn-primary"  href="addfriend.php?">Add friends</a></li>
				<li><a class="btn btn-primary" href="requests.php?">Requests</a></li>
					 </ul>
				</div>
			</div>
		</div></div></div></nav><br><br><br><br>
		
		<div class="container">
			<div style="padding:0px 20px 0px 20px">
<div class="row">
	<div class="col-lg-3">
<?php
		$host="localhost";
        $host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
		$con2=mysqli_connect("$host","$username","$password","$db_name");
        if($con2->connect_errno){
            echo "Connection problems".$con2->connect_error;
		}
		$identity;
		$email1=$objCrypt->decryptdata($_SESSION['Email']);
		$email=rtrim($email1,"\0");
		$query="Select * from $tb1_name where emailID='$email'";
		if($result=$con->query($query)){
			$row6=$result->fetch_array(MYSQLI_NUM);
			if($row6){
				$identity=$row6[0];
				$profile=$row6[6];
				$fname=$row6[1];
				$lname=$row6[2];
				echo "<img src='upload/".$profile."' width='150px' height='150px' alt='profile' class='img-rounded'/><br>";
			}
		}	
		 $align="left";
		 $fontsize="125%";
		 $display="block";
		 $width="60%";
		 $padding="5px 0px";
		 echo '<div style="text-align:'.$align.';font-size:'.$fontsize.'">'.$fname.' '.$lname.'</div>';
		 if($_SESSION['Role']==1 || $_SESSION['Role']==2)
		 echo'<a style="padding:'.$padding.';width:'.$width.'" class="btn btn-info" href="viewallusers.php">View Users</a>';
	 
	
		 
 }
 else{
	 session_destroy();
	 header("Location:index.php?message=bug2");
	 
	}
$align="center";
$fontsize="100%";
$display="block";
$width="60%";
$padding="5px 0px";
echo '<div style="padding:'.$padding.'"><a style="display:'.$display.';text-align:'.$align.';font-size:'.$fontsize.';width:'.$width.';padding:'.$padding.'" class="btn btn-info" href="edituserform.php?id='.$identity.'">Edit profile</a></div>';
echo '<div style="padding:'.$padding.'"><a style="display:'.$display.';text-align:'.$align.';font-size:'.$fontsize.';width:'.$width.';padding:'.$padding.'" class="btn btn-danger" href="logout.php?r='.$_SESSION['remember'].'">Logout</a></div>';
echo '</div>';
echo '<div class="col-lg-5">
            <div style="background-color:#d3d3d3;padding:5px 5px 5px 5px" class="img-rounded">
			<div style="display:inline-block"><img src="upload/'.$profile.'" alt="" class="img-circle" width="50" height="50"/></div><div style="display:inline-block"><h1 style="font-size:250%;font-family:cursive;padding-left:10px"><b><font color="cornflowerblue">What`s on your mind</font></b></h1></div>
            <div style="padding:0px 10px 0px 10px">
			<br>
                <form method="post" action="addstory.php" enctype="multipart/form-data">
                    <input type="file" name="image" id="image"><br>
                    <input type="text" name="story" placeholder="Post something" style="width:380px;height:100px"/><br><br>
                    <div style="padding:0px 160px 0px 160px"><input class="btn btn-success" type="submit" name="submit" value="Post"></div>
                </form>
            </div>
        </div><br>';

$receiver=$objCrypt->decryptdata($_SESSION['identity']);
			$query2="SELECT * FROM $tb2_name where poster in(Select sender from $tb3_name where receiver='$receiver' and accept='1')or poster='$receiver'";
			if($result1=$con->query($query2)){
				if($result1->num_rows>0){
				while($row1=$result1->fetch_array(MYSQLI_NUM)){
					
					$poster1=$row1[1];
					$query4="SELECT * FROM $tb1_name WHERE iD='$poster1'";
					if($result4=$con->query($query4)){
	
					$row4=$result4->fetch_array(MYSQLI_NUM);
					if($row4){
					echo "<div class='img-rounded' style='background-color:ffffff;padding:10px 5px 15px 20px'><div class='row'><div class='col-lg-1'>
					<img class='img-circle' src='upload/".$row4[6]."' width='70px' height='60px' alt='profile'/></div>";
					}
					
					
					}
					echo "<div class='col-lg-6 col-lg-push-1'><div style='display:block'><b ><font color='cornflowerblue'>".$row1[2]."</font></b> has posted an update</div></div></div><br>";
					echo "<div>  ".$row1[3]."</div><br>";
					if($row1[4]=='blank'){
						$st=trim($row1[2]);
						echo "<div><span style='padding-left:50px;padding-top:10px'><a class='btn btn-success' id='like' href='like.php?poster=".$row1[1]."&id=".$row1[0]."&text=".$row1[3]."'>Like"."  "."<span class='badge'>".$row1[5]."</span></a></span>"."     "."<span style='padding-left:50px;padding-top:10px'>
						".$st."
						<a class='btn btn-primary' href='comment.php?poster=".$st."&id=".$row1[0]."'>Comment</a></span></div></div><br>";
					}
					else{
					echo "<div><img src='upload1/".$row1[4]."'width='400px' height='350px' alt='story:".$row1[0]."'/></div><br><div><span style='padding-left:50px;padding-top:10px'>
					<a class='btn btn-success' id='like' href='like.php?poster=".$row1[1]."&id=".$row1[0]."&text=".$row1[3]."'>Like"."  "."<span class='badge'>".$row1[5]."</span></a></span>"."     "."<span style='padding-left:50px;padding-top:10px'>
					
					<a class='btn btn-primary' href='comment.php?poster=".$row1[2]."&id=".$row1[0]."'>Comment</a></span></div></div><br>";
					
					
					
					}
					 
					
						
					
				
				
				}
				
			}
			
			}
			$query3="Select * from $tb2_name where poster in(Select receiver from $tb3_name where sender='$receiver' and accept='1')";
			if($result2=$con->query($query3)){
				if($result2->num_rows>0){
				while($row2=$result2->fetch_array(MYSQLI_NUM)){
					$poster2=$row2[1];
					print_r($row2);
					$query5="SELECT * FROM $tb1_name WHERE iD='$poster2'";
					if($result5=$con->query($query5)){
	
					$row5=$result5->fetch_array(MYSQLI_NUM);
					if($row5){
					echo "<div style='background-color:ffffff;padding:10px 5px 15px 20px' class='img-rounded'><div class='row' ><div class='col-lg-1'>
					<img class=' img-circle' src='upload/".$row5[6]."' width='70px' height='60px' alt='profile'/></div>";
					}
					
					
					}

					echo "<div class='col-lg-6 col-lg-push-1'><div style='display:block'><b><font color='cornflowerblue'>".$row2[2]."</font></b> has posted an update</div></div></div><br>";
					echo "<div>".$row2[3]."</div><br>";
					if($row2[4]=='blank'){
						echo "<div><span style='padding-left:50px;padding-top:10px'><a class='btn btn-success' id='like' href='like.php?poster=".$row1[1]."&id=".$row2[0]."&text=".$row1[3]."'>Like"."  "."<span class='badge'>".$row1[5]."</span></a></span>"."     "."<span style='padding-left:50px;padding-top:10px'>
						
						<a class='btn btn-primary' href='comment.php?poster=".$row2[2]."&id=".$row2[0]."'>Comment</a></span></div></div><br>";
		
					}
					else
					echo "<div><img src='upload1/".$row2[4]."'width='400px' height='350px' alt='story:".$row2[0]."'/></div><br><div><span style='padding-left:50px;padding-top:10px'>
					<a class='btn btn-success' id='like' href='like.php?poster=".$row2[1]."&id=".$row2[0]."&text=".$row2[3]."'>Like"."  "."<span class='badge'>".$row2[5]."</span></a></span>"."     "."<span style='padding-left:50px;padding-top:10px'>
					
					<a class='btn btn-primary' href='comment.php?poster=".$row2[2]."&id=".$row2[0]."'>Comment</a></span></div></div><br>";
				}
			}
			
			}
			?>
	</div>
<div class="col-lg-2 col-lg-push-2">
	<?php
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
                echo '<center><p style="font-size:'.$sie.'">'.$row[2];
				//if
				//'<img src="offline.jpg" class="img-rounded" alt="" width="10px" height="10px"/>';
				echo '</p></center><br>';
			}
            elseif($row[1]==$iD){
                $sie="125%";
                echo '<center><p style="font-size:'.$sie.'">'.$row[4].'<img src="online.jpg" class="img-rounded" alt="" width="10px" height="10px"/></p></center><br>';
            }
			
        }
    }
}
?>
</div>
</div>
			</div>
    <script src="js/jquery2.0.js"></script>   
        <script src="js/bootstrap.min.js" ></script>
		<script>
			$(document).ready(function(){
					$("#like").click(function(){
						$(this).addClass('disabled');
					});
			});
			
		</script>

    </body>
</html>
