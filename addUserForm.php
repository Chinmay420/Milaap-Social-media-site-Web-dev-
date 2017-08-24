<html>
<head>
	    <meta charset="utf-8"/>
        <title>
            Sign up
        </title>
<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/main.css">
   <script type="text/javascript" src="scripts/jquery.js"></script>
  <script type="text/javascript" src="scripts/validate.js"></script>
  <script type="text/javascript" src="available.js"></script>
 <script> 
 jQuery.validator.addMethod('passwordCheck', function(value,element){
		var password = $("#password").val();
		var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{5,8}$/;
		if(regex.test(password))
		return true;
		else 
			false;
		},"Password must contain atlest one uppercase, lowercase, digit and special Characters ");
	function submitForm(){
	var validator = $("#register-form").validate({
	
		errorElement: 'span',
		errorClass: 'errorMsg',
		
		rules: {        	        		
			fName: {
				required: true,
				minlength: 5,
				maxlength:20
			},
			emailId : {
				required: true,
				email:true
				
			},
			
			password: {
				required: true,
				passwordCheck: true,
				
			},
			confirmPassword:{
				equalTo: "#password"
			}
			
					
    	},
		messages:{
				password:{
				passwordCheck: "Password must contain more than 5 characters"
				},
				fName:{
					required:"first name is required"
				}
			
			},
	    errorPlacement: function(error,element){
			error.appendTo(element.parent("td").next("td"));
		}
	});
	if(validator.form()){ // validation perform
				
		$('#register-form').submit();
	}
}


 </script>
 <style>
 span.errorMsg
 {
	color:Red
 }
 </style>
</head>
<body>
<div class="User Form ">
<h1 align="center" style="background-color:#3399FF;font-size:300%">Sign Up</h1>
<?php if(isset($_GET['message']))
echo "<h2>".$_GET['message']."</h>";
?>
<form action="adduser.php" method="post" id="register-form">
<table>
<tr>
<td>First Name:</td><td><input type="text" name="fName"></td><td><span class="errorMsg"></span></td><br>
</tr>
<tr>
<td>Last Name:</td><td><input type="text" name="lName"></td><td><span class="errorMsg"></span></td><br>
</tr>
<tr>
<td>Email:</td><td><input type="text" name="emailId"></td><td><span class="errorMsg"></span></td><br>
</tr>
<tr>
<td>Password:</td><td><input type="password" name="password" id="password" )"></td><td><span class="errorMsg"></span></td><br>
</tr>
<tr>
<td>Confirm Password:</td><td><input type="password" name="confirmPassword"></td><td><span class="errorMsg"></span></td><br>
</tr>
</table>
<input type="submit" value="Submit" onclick="submitForm();">
</form>
</body>
</html>