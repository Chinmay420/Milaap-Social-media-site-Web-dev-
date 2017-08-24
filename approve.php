<HTML>
	<BODY>
		<script type="text/javascript" src="scripts/jquery.js"></script>	
		<script >
			function hidereq(){
			$("#ech").innerhtml("");
			$("#ech1").innerhtml("");
		
	}
</script>
	</BODY>
</HTML>
<?php
session_start();
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
$i=1;
$b=0;
$id2=$_GET['id'];
$id1=$objCrypt->decryptdata($_SESSION['identity']);
$id=rtrim($id1,"\0");
$query="update $tb1_name set accept='$i' where receiver='$id' And sender='$id2' ";
if($result=$con->query($query)){
    
    header("Location:requests.php?msg2=Request accepted");   
    }
    else
     header("Location:requests.php?msg2=Friend request declined");  
?>