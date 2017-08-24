<html>
    <head>
        <meta charset="utf-8"/>
        <title>
            Post Story
        </title>
<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="container">
            
            <h1 style="background-color:#3399FF;font-size:300%" align="center">What's on your mind</h1>
            <div style="padding:0px 20px 0px 60px">
            <div class="row">
                <form method="post" action="addstory.php" enctype="multipart/form-data">
                    <input type="file" name="image" id="image"><br>
                    <input type="text" name="story" placeholder="Post something" style="width:400px;height:100px"/><br><br>
                    <div style="padding:0px 160px 0px 160px"><input class="btn btn-success" type="submit" name="submit" value="Submit"></div>
                </form>
            </div>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>   
        <script src="js/bootstrap.min.js" ></script>

    </body>
</html>