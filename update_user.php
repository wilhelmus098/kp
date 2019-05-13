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
	if($_SESSION['jabatan'] == "PENDETA")
	{
		require_once('sidemenupendeta.php');
	}
	if($_SESSION['jabatan'] == "BENDAHARA")
	{
		require_once('sidemenu.php');
	}
	if($_SESSION['jabatan'] == "PENGINJIL" || $_SESSION['jabatan'] == "KOOR PUSAT" || $_SESSION['jabatan'] == "KOOR CABANG")
	{
		require_once('sidemenupemimpin.php');
	}		
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
								$sql = "select * from User where uname='" . $iduser . "'";
								$result = mysqli_query($mysqli, $sql);
								$uname = "";
								$userName = "";
								$userPass = "";
								$userPos = "";
								if ($result->num_rows > 0)
								{
									while($row = $result->fetch_assoc())
									{
										$uname = $row["uname"];
										$userPass = $row["pass"];
									}
								}
						    ?>
							<form role="form" action="controllers/users.php" method="POST"> 
								<label>User Name</label>
								<div class="form-group">
									<input class="form-control" placeholder="Username" name="username" type="username" autofocus="" value="<?=$iduser?>" disabled>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Old Password" name="password" type="password" value="" required>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="New Password" name="password1" type="password" value="" required>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Retype New Password" name="password2" type="password" value="" required>
								</div>
								<div class="form-group">
									<label>Jemaat GBA</label>
										<select class="form-control" name="gereja_jemaat_id" required>
											<?php
												$sql = "select * from Gereja";
												$result = mysqli_query($mysqli, $sql);
												if($result->num_rows > 0)
												{
													while($row = $result->fetch_assoc())
													{
														if($row["idGereja"] == $_SESSION['idgereja'])
														{
															echo "<option value=\"". $row['idGereja'] ."\" selected >".$row["JenisGereja"]." - ".$row["Nama"]."</option>";
														}
														else
														{
															echo "<option value=\"". $row['idGereja'] ."\"  >".$row["JenisGereja"]." - ".$row["Nama"]."</option>";	
														}
														
													}
												}
											?>
										</select>
								</div>
<!-- 								<div class="form-group">
									<label>Jabatan</label>
									<select class="form-control" name="position" <?php if($_SESSION['jabatan']=='BENDAHARA') echo 'disabled'; ?>>
										<option value="PENDETA"<?php if($userPos=='PENDETA')echo " selected"?>>PENDETA</option>
										<option value="PENGINJIL"<?php if($userPos=='PENGINJIL')echo " selected"?>>PENGINJIL</option>
										<option value="KOOR PUSAT"<?php if($userPos=='KOOR PUSAT')echo " selected"?>>KOORDINATOR PUSAT</option>
										<option value="KOOR CABANG"<?php if($userPos=='KOOR CABANG')echo " selected"?>>KOORDINATOR CABANG</option>
										<option value="BENDAHARA"<?php if($userPos=='BENDAHARA')echo " selected"?>>BENDAHARA</option>
									</select>
								</div> -->

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