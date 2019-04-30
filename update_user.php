<!DOCTYPE html>
<?php
    include 'conn.php';
	include 'checksession.php';
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php 
		require_once('sidemenu.php');
	?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Update User</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
							<div class="col-md-6">
							<?php
								$iduser = $_SESSION["uname"];
								$sql = "select * from user where iduser='" . $iduser . "'";
								$result = mysqli_query($mysqli, $sql);
								$idUser1 = "";
								$userName = "";
								$userPass = "";
								$userPos = "";
								if ($result->num_rows > 0)
								{
									while($row = $result->fetch_assoc())
									{
										$idUser1 = $row["iduser"];
										$userName = $row["user_name"];
										$userPass = $row["user_password"];
									}
								}
						    ?>
							<form role="form" action="controllers/users.php" method="POST"> 
								<label>User Name</label>
								<div class="form-group">
									<input class="form-control" placeholder="Username" name="username" type="username" autofocus="" value="<?=$iduser?>">
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Old Password" name="password" type="password" value="">
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="New Password" name="password1" type="password" value="">
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Retype New Password" name="password2" type="password" value="">
								</div>
								<div class="form-group">
									<label>Position</label>
									<select class="form-control" name="position">
										<option value="Admin"<?php if($userPos=='Admin')echo " selected"?>>Admin</option>
										<option value="Actress"<?php if($userPos=='Actress')echo " selected"?>>Actress</option>
										<option value="Manager"<?php if($userPos=='Manager')echo " selected"?>>Manager</option>
									</select>
								</div>
								<input type="submit" class="btn btn-primary" name="btnUpdate" value="Update User">
								<input type="submit" class="btn btn-primary" name="btnDelete" value="Delete User">
							</form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			
		</div><!-- /.row -->
		
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
		
</body>
</html>