<?php
session_start();
if(!isset($_SESSION['loggedin'])){
	header("Location:index.php");
}
 
$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
$tb1_name="user";
$con=mysqli_connect("$host","$username","$password","$db_name");
require("encryption.php");
    $objCrypt=new Cryptography();
$id=$_POST['id'];
$fName=$_POST['fName'];
$lName=$_POST['lName'];
$email=$_POST['Email'];

if($con->connect_errno){
	echo "Connection problems".$con->connect_error;
}  
$query="Update $tb1_name set fName='$fName',lName='$lName',emailID='$email' where iD='$id'";
if($con->query($query)){
	if($con->affected_rows){
		header("Location:success.php?r=".$remember);
	}
	else
		echo $con->error;
}
else
	echo $con->error;
?>
<?php
	
if(isset($_FILES['image'])){
    $errors=array();
    $name=$_FILES['image']['name'];
	if($name==""){
			$host="localhost";
			$username="connect3";
			$password="477kknLU8y";
			$db_name="connect3_php";
			$tb1_name="user";
			$con=mysqli_connect("$host","$username","$password","$db_name");
			if($con->connect_errno){
				echo "Connection problems".$con->connect_error;
			}
				$ide1=$objCrypt->decryptdata($_SESSION['identity']);
				$ide=rtrim($ide1,"\0");
				$query="Select * from $tb1_name where iD='$ide'";
				if($result=$con->query($query)){
					$row=$result->fetch_array(MYSQLI_NUM);
					$name=$row[6];
				}
			
		}
    $ext=(explode(".",$name));
    $size=$_FILES['image']['size'];
    $tmpname=$_FILES['image']['tmp_name'];
    $validExt=array("jpg","jpeg","png","gif","");
    if(!(in_array($ext[1],$validExt))){
        $errors[]="File format not supported";
    }
    if($size/(1024*1024)>2)
    {
        $errors[]="File too large";
    }
    if(empty($errors)){
			$newFilename;
			$host="localhost";
			$username="connect3";
			$password="477kknLU8y";
			$db_name="connect3_php";
			$tb1_name="user";
			$con=mysqli_connect("$host","$username","$password","$db_name");
			if($con->connect_errno){
				echo "Connection problems".$con->connect_error;
			}
				$iden1=$objCrypt->decryptdata($_SESSION['identity']);
				$iden=rtrim($iden1,"\0");
				$query1="Select * from $tb1_name where iD='$iden'";
				if($result1=$con->query($query1)){
					$row1=$result1->fetch_array(MYSQLI_NUM);
						if($name==$row1[6]){
							
							$newFilename=$row1[6];
			}
				
			else{
					$newFilename=$ext[0].substr(session_id(),0,5).rand(0,1000).".".$ext[1];
					move_uploaded_file($tmpname,"upload/".$newFilename);
				
				}
			}
		
	
		
        $query4="UPDATE $tb1_name  set profilepic='$newFilename' where iD='$id'";
			if($result=$con->query($query4)){
           
				
					$remember=$_SESSION['remember'];
				
					header("Location:success.php?r=".$remember);
                    }
			
         
        else
        $errors[]=$con->error;

    }
    if(!(empty($errors)))
    print_r($errors);
}
?>
<?php
if(isset($_FILES['image1'])){
    $errors=array();
    $name=$_FILES['image1']['name'];
	if($name==""){
$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
			$tb1_name="user";
			$con=mysqli_connect("$host","$username","$password","$db_name");
			if($con->connect_errno){
				echo "Connection problems".$con->connect_error;
			}
				$ide1=$objCrypt->decryptdata($_SESSION['identity']);
				$ide=rtrim($ide1,"\0");
				$query="Select * from $tb1_name where iD='$ide'";
				if($result=$con->query($query)){
					$row=$result->fetch_array(MYSQLI_NUM);
					$name=$row[8];
				}
			
		}
    $ext=(explode(".",$name));
    $size=$_FILES['image1']['size'];
    $tmpname=$_FILES['image1']['tmp_name'];
    $validExt=array("jpg","jpeg","png","gif","");
    if(!(in_array($ext[1],$validExt))){
        $errors[]="File format not supported";
    }
    if($size/(1024*1024)>2)
    {
        $errors[]="File too large";
    }
    if(empty($errors)){
			$newFilename;
$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
			$tb1_name="user";
			$con=mysqli_connect("$host","$username","$password","$db_name");
			if($con->connect_errno){
				echo "Connection problems".$con->connect_error;
			}
				$iden1=$objCrypt->decryptdata($_SESSION['identity']);
				$iden=rtrim($iden1,"\0");
				$query1="Select * from $tb1_name where iD='$iden'";
				if($result1=$con->query($query1)){
					$row1=$result1->fetch_array(MYSQLI_NUM);
						if($name==$row1[8]){
							
							$newFilename=$row1[8];
			}
				
			else{
					$newFilename=$ext[0].substr(session_id(),0,5).rand(0,1000).".".$ext[1];
					move_uploaded_file($tmpname,"upload/".$newFilename);
				
				}
			}
		
	
		
        $query4="UPDATE $tb1_name  set coverpic='$newFilename' where iD='$id'";
			if($result=$con->query($query4)){
           
				
					$remember=$_SESSION['remember'];
				
					header("Location:success.php?r=".$remember);
                    }
			
         
        else
        $errors[]=$con->error;

    }
    if(!(empty($errors)))
    print_r($errors);
}
?>