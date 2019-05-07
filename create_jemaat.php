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
				<li class="active">Tambah Jemaat</li>
			</ol>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
								
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="POST" action="controllers/jemaat.php">
									<div class="form-group">
										<label>Nama</label>
										<input type="text" class="form-control" name="nama_jemaat" placeholder="Nama Jemaat">
									</div>

									<div class="form-group">
										<label>Tempat Lahir</label>
										<input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
									</div>

									<div class="form-group">
										<label>Tanggal Lahir</label>
										<input type="date" class="form-control" name="tgl_lahir" placeholder="">
									</div>

									<div class="form-group">
										<label>Alamat</label>
										<input type="text" class="form-control" name="alamat_jemaat" placeholder="Jalan Apa">
									</div>

									<div class="form-group">
										<label>Nomor Telepon</label>
										<input type="text" class="form-control" name="nomor_jemaat" placeholder="">
									</div>

									<div class="form-group">
										<label>Jemaat GBA</label>
										<select class="form-control" name="gereja_jemaat_id">
											<?php
												$sql = "select * from Gereja";
												$result = mysqli_query($mysqli, $sql);
												if($result->num_rows > 0)
												{
													while($row = $result->fetch_assoc())
													{
														echo "<option value=\"". $row['idGereja'] ."\">".$row["JenisGereja"]." - ".$row["Nama"]."</option>";
													}
												}
											?>
										</select>
									</div>

									

									<button type="submit" class="btn btn-primary" name="create_jemaat" >Tambah Jemaat</button>
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