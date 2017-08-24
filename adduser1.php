<?php
session_start();
?><html>
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

<script type="text/javascript">	
jQuery.validator.addMethod('passwordCheck',function(value,element){
	var password=$("#password").val();
	var regex=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{5,12}$/;
	if(regex.test(password))
		return true;
	else
		false;
},"Password must contain atleast one small alphabet,one capital letter,one digit,one special character and must be between 5 to 8 characters");
function submitForm(){
	var validator=$("#register-form").validate({
		errorElement: 'span',
		errorClass: 'errorMsg',
		rules:{
			fName:{
				required:true,minlength:5,maxlength:20
			},
			lName:{
				minlength:5,maxlength:20
			},
			Email:{
				required:true,email:true
			},
			pAssword:{
				required:true,
				passwordCheck:true
			},
			confirmpass:{
				equalTo:"#password"
				}
              
		},
		messages:{
			password:{
				passwordCheck: "Password must contain more than 5 characters"
			},
			fName:{
				required:"First Name is required"
			}
		},
			errorPlacement: function(error,element){
			error.appendTo(element.parent("td").next("td"));
			}
	});
	if(validator.form()){
		$('#register-form').submit();
	}
}	
</script>
</head>
<body style="background-color:aliceblue">
<style>
td{
	font-size:125%;
}
span.errorMsg{
	color:Red
}

</style>
<h1 align="center" style="background-color:#3399FF;font-size:300%">Signup</h1>
<div class="container">
<div style="display:inline">
<img src="4.jpg" alt="Signup" width="650px" height="350px" style="padding:0px 50px 0px 50px;float:left " >
<b><p style="float:right;font-size:150%;padding:20px 100px 20px 100px">Your details here</p></b>
<form method="post" action="adduser.php" id="register-form" > 
<table style="float:right;padding:0px 30px 0px 30px" >
<tr>
<td>First Name:</td>
<td><input type="text" name="fName"></td>
<td><span class="errorMsg"></span></td><br></br>
</tr>
<tr>
<td>Last Name:</td>
<td><input type="text" name="lName" ></td><td><span class="errorMsg"></span></td>
</tr>
<tr>
<td >Email ID:</td>
<td><input type="text" name="Email" id="Email" onkeyup="loadImg();" onchange="ifAvailable();"></td>
<td><img src="loader.gif" height="50px" width="50px" id="loader" style="display:none"/>
<div id="status"></div></td><td><span class="errorMsg"></span></td>
</tr>
<tr>
<td>Create password:</td>
<td><input type="password" name="pAssword" id="password" ></td><td><span class="errorMsg"></span></td>
</tr>
<tr>
<td>Confirm password:</td>
<td><input type="password" name="confirmpass"  ></td><td><span class="errorMsg"></span></td>
</tr>
</table><div style="padding:5px 0px 0px 100px">
<img src='captchaform.php' align='middle' id="img" style="float:right;padding:0px 130px 0px 20px"/><br>
<input name='captcha' type='text' placeholder='Enter captcha' align='middle' id="place" style="float:right;text-align: center;padding:0px 10px 0px 10px;font-size: 110%"><br></div>
<p class="submit" style="text-align:center;font-size:125%;padding:200px 0px 0px 200px" ><input type="Submit" name="Signup" onclick="submitForm();" id="main"></p><br>
</form>
</div>
</div>
</body>
</html>
