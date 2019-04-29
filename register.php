<!-- <?php
include 'auth.php';
include 'conn.php';
if (isset ($_SESSION['stat']))
{
	session_destroy();
}
else
{
	
}
?> -->
<!DOCTYPE html>
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
					<form role="form" action="users.php" method="POST"> 
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="username" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Retype Password" name="password1" type="password" value="">
							</div>
							<div class="form-group">
								<label>Nama Jemaat: </label>
								<select class="form-control" name="gereja_jemaat_id">
									<?php
										$sql = "SELECT * FROM jemaat";
										$result = mysqli_query($mysqli, $sql);
										if($result->num_rows > 0)
										{
											while($row = $result->fetch_assoc())
											{
												echo "<option value=\"".$row["idJemaat"]."\">".$row["NamaJemaat"]."</option>";
											}
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Jabatan: </label>
								<select class="form-control" name="jabatan">
									<option value="Pendeta">Pendeta</option>
									<option value="Penginjil">Penginjil</option>
									<option value="KoorPusat">Koordinator Pusat</option>
									<option value="KoorCab">Koordinator Cabang</option>
									<option value="Bendahara">Bendahara</option>								
								</select>
							</div>							
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<input type="submit" name="btnRegister" value="Register">
							
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
