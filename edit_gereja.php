<!DOCTYPE html>
<?php
	include 'conn.php';
	// include 'checksession.php';
	// require('MagicCrypt.php');
	// use org\magiclen\magiccrypt\MagicCrypt;
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
				<li class="active">Edit Gereja</li>
			</ol>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">	
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-6">
                        <?php
							$idGereja = $_GET['idgereja'];
							$sql = "SELECT * FROM gereja WHERE idGereja='" . $idGereja . "'";
							$result = mysqli_query($mysqli, $sql);
							$idgereja1 = "";
                            $alamatgereja1 = "";
                            $jenisgereja1 = "";
                            
							if ($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
								{	
                                    $idgereja1 = $row["idGereja"];
                                    $alamatgereja1 = $row["AlamatGereja"];
                                    $jenisgereja1 = $row["JenisGereja"];
								}
							}
						?>
							<form role="form" method="POST" action="controllers/gereja.php">
									<div class="form-group">
										<label>ID Gereja</label>
                                        <input class="form-control" placeholder="" name="idgereja" type="text" autofocus="" value="<?=$idgereja1?>">
									</div>
									<div class="form-group">
										<label>Jenis Gereja</label>
                                        <input class="form-control" placeholder="" name="jenis_gereja" type="text" autofocus="" value="<?=$jenisgereja1?>">
									</div>
									
									<div class="form-group">
										<label>Alamat Gereja</label>
										<input type="text" class="form-control" name="alamat_gereja" placeholder="" value="<?=$alamatgereja1?>">
									</div>
									<button type="submit" class="btn btn-primary" name="edit_gereja">Update Gereja</button>
									<button type="submit" class="btn btn-primary" name="delete_gereja">Delete Gereja</button>
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