<!DOCTYPE html>
<?php
	include 'conn.php';
	//include 'checksession.php';
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
				<li class="active">Tambah Jemaat</li>
			</ol>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
								
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="POST" action="controllers/persembahan.php">
									<div class="form-group">
										<label>ID Persembahan :</label>
											<select class="form-control" name="nota_persemabahan_id">
												<?php
													$sql = "select * from NotaPersembahan";
													$result = mysqli_query($mysqli, $sql);
													if($result->num_rows > 0)
													{
														while($row = $result->fetch_assoc()){
															echo "<option value=\"".$row["idNotaPersembahan"]."\">".$row["idNotaPersembahan"]." - ".$row["TglIbadah"]."</option>";
													}
												}
												?>
											</select>
									</div>

									<div class="form-group">
										<label>Nama Jemaat</label>
											<select class="form-control" name="jemaat_nama_id">
												<?php
													$sql = "select * from Jemaat";
													$result = mysqli_query($mysqli, $sql);
													if($result->num_rows > 0)
													{
														while($row = $result->fetch_assoc()){
															echo "<option value=\"".$row["idJemaat"]."\">".$row["NamaJemaat"]."</option>";
													}
												}
												?>
											</select>
									</div>

									<div class="form-group">
										<label>Persembahan Hari Tuhan </label>
										<input type="text" class="form-control" name="persembahan_hari_tuhan" placeholder="">
									</div>			

									<div class="form-group">
										<label>Perpuluhan</label>
										<input type="text" class="form-control" name="perpuluhan" placeholder="">
									</div>														

									<div class="form-group">
										<label>Ucapan Syukur</label>
										<input type="text" class="form-control" name="ucapan_syukur" placeholder="">
									</div>							

									<div class="form-group">
										<label>Hari Raya</label>
										<input type="text" class="form-control" name="hari_raya" placeholder="">
									</div>			

									<div class="form-group">
										<label>Janji Iman</label>
										<input type="text" class="form-control" name="janji_iman" placeholder="">
									</div>			

									<div class="form-group">
										<label>Pembangunan Gereja</label>
										<input type="text" class="form-control" name="pembangunan_gereja" placeholder="">
									</div>			

									<div class="form-group">
										<label>Lain-lain</label>
										<input type="text" class="form-control" name="lain_lain" placeholder="">
									</div>			

									<button type="submit" class="btn btn-primary" name="create_persembahan_khusus" >Tambah Persembahan Khusus</button>
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