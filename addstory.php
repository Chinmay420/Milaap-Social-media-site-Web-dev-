<?php
session_start();
 require("encryption.php");
 $objCrypt=new Cryptography();
if(isset($_FILES['image'])){
    $errors=array();
    $name=$_FILES['image']['name'];
    if($name==""){
        $name="blank";
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
        if($name=="blank"){
            $newFilename="blank";
        }
        else{
        $newFilename=$ext[0].substr(session_id(),0,5).rand(0,1000).".".$ext[1];
        move_uploaded_file($tmpname,"upload1/".$newFilename);
        }
        $host="localhost";
	$username="connect3";
	$password="477kknLU8y";
	$db_name="connect3_php";
        $tb1_name="stories";
        $con=mysqli_connect("$host","$username","$password","$db_name");
        if($con->connect_errno){
            echo "Connection problems".$con->connect_error;
        }
        $id1=$objCrypt->decryptdata($_SESSION['identity']);
        $text=$_POST['story'];
        $i1=$objCrypt->decryptdata($_SESSION['user'])." ".$objCrypt->decryptdata($_SESSION['user2']);
        $name=rtrim($i1,"\0");
        $id=rtrim($id1,"\0");
        if($stmt=$con->prepare("insert into $tb1_name (poster,postername,storytext,storyimage)values(?,?,?,?)")){
            $stmt->bind_param('ssss',$id,$name,$text,$newFilename);
            if($stmt->execute()){
                if($stmt->affected_rows){
                    header("Location:success.php?r=".$_SESSION['remember']);
                    }
                else
                $errors[]="There is error";
            }
            else
            $errors[]="There is error";
        }
        else
        $errors[]=$con->error;

    }
    if(!(empty($errors)))
    print_r($errors);
}

?>