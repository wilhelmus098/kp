<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION["user_logged_in"]))
{
	header("location:list_schedule.php");
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" method="POST" >
						<fieldset>
							<div class="form-group">
								<input class="form-control" id="username" placeholder="Username" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" id="password" placeholder="Password" name="password" type="password" value="">
							</div>
							<button type="button" class="btn btn-primary" id="submit" name="btn_login" value="Login">Login</button>

					</form>
					<br/>
					<br/>
					<font color="red">
					<span class="error" name="error" id="error">  
						
					</span>
					</font>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
			
			$(document).ready(function(){
				$(document).keypress(function(a){
					if (a.which == 13)
					{
						$.post("controllers/login.php",{username: username.value, password: password.value},function(data){	
							console.log(data);
							if(data == 1)
							{
								window.open("list_schedule.php","_self")
							}
							else
								$("#error").text("wrong username or password")

						}) 
						
					} 
					
				})
				$("#submit").click(function(){
					$.post("controllers/login.php",{username: username.value, password: password.value},function(data){		
						if(data == 1)
						{
							window.open("list_schedule.php","_self")
						}
						else
							$("#error").text("wrong username or password")
					}) 	
				})	
			})
			
			
			
		</script>
</body>
</html>
