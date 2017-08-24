<head>
<title>
	Sign up
</title>
<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>
    <div>
		<img src="10.jpg" alt="" title="" style="position:absolute; z-index:-1; width:100%; height:100%;"/>
	</div>
    <div class="container">
        <div class="row">
            <div class="col-xs-1">
                <img src="11.jpg" alt="" class="img-circle" width="60px" height="60px" style="padding-top:16px">
            </div>
            <div class="col-xs-11">
                <h1 class="btn btn-info" style="float:right;font-size:140%;font-family: cursive">Sign up</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-5" style="padding-top:30px">
                <img src="13.jpg" alt="" class="img-responsive img-circle" width="500px" height="350px">
            </div>
            <div class="col-xs-7 col-xs-push-1">
                <div style="padding-left:100px"><font color="cornflowerblue"><h1 style="font-family: important">Personal Details</h1></font></div>
                <form action="adduser.php" method="post" class="form-horizontal" id="form">
                    <div class="form-group">
                        <label for="fName" class="col-xs-4 control-label col-xs-pull-1" style="font-size: medium;float:left">
                        <font color="cornflowerblue">First Name</font>
                        </label>
                        <div class="col-xs-3">
                            <input type="text" class="form-control" id="fName" style="background-color:transparent" name="fName"><div><span class="errorMsg"></span></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lName" class="col-xs-4 control-label col-xs-pull-1" style="font-size: medium;padding-right:26px">
                            <font color="cornflowerblue">SurName</font>
                        </label>
                        <div class="col-xs-3">
                            <input type="text" class="form-control" id="lName" style="background-color:transparent" name="lName"><span class="errorMsg"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-xs-4 control-label col-xs-pull-1" style="font-size: medium;padding-right:53px">
                           <font color="cornflowerblue"> Email</font>
                        </label>
                        <div class="col-xs-3">
                            <input type="email" class="form-control" id="email" style="background-color:transparent" name="email"><span class="errorMsg"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-xs-4 control-label" style="font-size: medium;padding-right:37px">
                            <font color="cornflowerblue">New Password</font>
                        </label>
                        <div class="col-xs-3">
                            <input type="password" class="form-control" id="password" style="background-color:transparent" name="password"><span class="errorMsg"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pass2" class="col-xs-4 control-label" style="font-size: medium">
                            <font color="cornflowerblue">Confirm Password</font>
                        </label>
                        <div class="col-xs-3">
                            <input type="password" class="form-control" id="pass2" style="background-color:transparent" name="pass2"><span class="errorMsg"></span>
                        </div>
                    </div>
                    <div class="form-group" id="sex" name="sex">
                        <label for="male" class="col-xs-3 control-label" style="font-size: medium;padding-left:50px">
                            <font color="cornflowerblue">Male</font>
                        </label>
                        <div class="col-xs-1">
                            <input type="radio" class="form-control" style="background-color:transparent" id="male" name="male">
                        </div>
                        <label for="female" class="col-xs-1 control-label" style="font-size: medium;padding-left:30px">
                            <font color="cornflowerblue">Female</font>
                        </label>
                        <div class="col-xs-1 col-xs-push-1">
                            <input type="radio" class="form-control" style="background-color:transparent" id="female" name="female">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-5 col-xs-push-3">
                            <input type="submit" class="" style="background-color:transparent;color:cornflowerblue;font-size: 115%;padding:5px 10px 5px 10px" id="submit" name="submit" onclick="submitform();">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="js/jquery.min.js"></script>   
<script src="js/bootstrap.min.js" ></script>
<script type="text/javascript" src="scripts/validate.js"></script>
<script type="text/javascript">
    jQuery.validator.addMethod('passwordCheck',function(value,element){
	var password=$("#password").val();
	var regex=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{5,12}$/;
	if(regex.test(password))
		return true;
	else
		return false;
},"Password must contain atleast one small alphabet,one capital letter,one digit,one special character and must be between 5 to 8 characters");
    function submitform(){
        var validator=$("#form").validate({
            errorElement:'span',
            errorClass:'errorMsg',
            rules:{
                fName:{
                    required:true,
                    minlength:3,
                    maxlength:15
                },
                lName:{
                    required:true,
                    minlength:3,
                    maxlength:15
                },
                email:{
                    required:true,
                    email:true
                },
                password:{
                    required:true,
                    passwordCheck:true
                    
                },
                pass2:{
                    equalTo:"#password"
                },
                sex:{
                    required:true
                }
            },
            messages:{
                fName:{
                    required:"First Name is required"
                }
                
            },
            errorPlacement: function(error,element){
            error.appendTo(element.parent("div").next("div"));
            }
        });
        if(validator.form()){
            $("#form").submit();
        }
    }
</script>
</body>
</html>