<?php

class Log
{
	
	
	public function logs($action)
	{	
		$Where=$_SERVER['REMOTE_ADDR'];		 
		$Who = $_SESSION["Email"];
		$When = date('Y/m/d H:i:s');
		
		$host="localhost";
$username="connect3";
$password="477kknLU8y";
$db_name="connect3_php";
		$tbl_name="i"; // Table name 
	
		$con = mysqli_connect("$host", "$username", "$password","$db_name");
		$stmt = $con->prepare("Insert into $tbl_name (user,time,location,action)values(?,?,?,?) ");
		$stmt->bind_param('ssss',$Who,$When,$Where,$action);
		$stmt->execute();
		
		
		 
	}
	public function login()
	{
		$this->logs("login");
	}
	public function logout()
	{
		$this->logs("logout");
	}
	public function viewProfile()
	{
		$this->logs("View Profile");
	}
	public function editProfile()
	{
		$this->logs("Edit Profile");
	}
	
}

?>