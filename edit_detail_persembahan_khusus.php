<!DOCTYPE html>
<?php
	include 'conn.php';
	include 'checksession.php';
	require('MagicCrypt.php');
	use org\magiclen\magiccrypt\MagicCrypt;
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

	<style type="text/css">
		table{
			width: 100%;
		}

	</style>
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
				<li class="active">EDIT DETAIL PERSEMBAHAN KHUSUS</li>
			</ol>
	</div><!--/.row-->

	<div class="row">
			<div class="col-lg-12">	
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-6">
                        <?php
							$idjemaat = $_GET["idjemaat"];
							$sql = "SELECT * FROM DetailNotaPersembahan WHERE idJemaat = '" .$idjemaat . "'";
							$result = mysqli_query($mysqli, $sql);
							$idnota1 = "";
                            $jemaat1 = "";
                            $pk1 = "";
                            $pk2 = "";
                            $pk3 = "";
                            $pk4 = "";
                            $pk5 = "";
                            $pk6 = "";
                            $metode1 = "";
                           
							if ($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
								{
									$idnota1 = $row["idNotaPersembahan"];
		                            $jemaat1 = "";
		                            $pk1 = $row["PK_HariTuhan"];
		                            $pk2 = $row["PK_Perpuluhan"];
		                           	$pk3 = $row["PK_UcapanSyukur"];
		                            $pk4 = $row["PK_JanjiIman"];
		                            $pk5 = $row["PK_PembangunanGereja"];
		                            $pk6 = $row["PK_LainLain"];
		                            $metode1 = $row["CaraPembayaran"];
								}
							}
						?>
						<form role="form" method="POST" action="controllers/persembahan.php">
									<div class="form-group">
										<label>ID Nota</label>
										<select class="form-control" name="id_nota" required>
											<?php
												$sql = "SELECT * FROM NotaPersembahan";
												$result = mysqli_query($mysqli, $sql);
												if($result->num_rows > 0)
												{
													while($row = $result->fetch_assoc())
													{
														if($row['idNotaPersembahan'] == $_GET['idnota'])
														{
															echo "<option value=\"". $row['idNotaPersembahan'] ."\" selected >".$row["idNotaPersembahan"]."</option>";
														}
														else
														{
														echo "<option value=\"". $row['idNotaPersembahan'] ."\">".$row["idNotaPersembahan"]."</option>";
														}
													}
												}
											?>
										</select>
									</div>

									<div class="form-group">
										<label>NAMA JEMAAT</label>
										<select class="form-control" name="nama_jemaat" required>
											<?php
												$sql = "SELECT * FROM Jemaat WHERE idGereja = '" . $_SESSION["idgereja"] . "'";
												$result = mysqli_query($mysqli, $sql);
												if($result->num_rows > 0)
												{
													while($row = $result->fetch_assoc())
													{
														if($row['idJemaat'] == $_GET['idjemaat'])
														{
															echo "<option value=\"". $row['idJemaat'] ."\" selected >".$row["NamaJemaat"]."</option>";
														}
														else
														{
															echo "<option value=\"". $row['idJemaat'] ."\">".$row["NamaJemaat"]."</option>";
														}

													}
												}
											?>
										</select>	
									</div>

									<div class="form-group">
										<label>HARI TUHAN</label>
										<input type="text" class="form-control" name="nilai_hari_tuhan" placeholder="RP." value="<?=$pk1?>" >
									</div>

									<div class="form-group">
										<label>PERPULUHAN</label>
										<input type="text" class="form-control" name="nilai_perpuluhan" placeholder="RP." value="<?=$pk2?>">
									</div>

									<div class="form-group">
										<label>UCAPAN SYUKUR</label>
										<input type="text" class="form-control" name="nilai_ucapan_syukur" placeholder="RP." value="<?=$pk3?>">
									</div>

									<div class="form-group">
										<label>JANJI IMAN</label>
										<input type="text" class="form-control" name="nilai_janji_iman" placeholder="RP." value="<?=$pk4?>">
									</div>

									<div class="form-group">
										<label>PEMBANGUNAN GEREJA</label>
										<input type="text" class="form-control" name="nilai_pembangunan_gereja" placeholder="RP." value="<?=$pk5?>">
									</div>

									<div class="form-group">
										<label>LAIN - LAIN</label>
										<input type="text" class="form-control" name="nilai_lain" placeholder="RP." value="<?=$pk6?>">
									</div>

									<div class="form-group">
										<label>METODE PERSEMBAHAN</label>
										<select class="form-control" name="metode_persembahan" required value="<?=$CaraPembayaran?>">
											<option value="TUNAI">TUNAI</option>
											<option value="TRF">TRANSFER</option>
										</select>	
									</div>

									<?php

									?>
									<div class="text-center" style="margin: 8px">
										<button class='btn btn-primary m-2' style="width:200px" value="<?php echo  $_GET['idjemaat'] . ',' . $_GET['idnota']?>" name="edit_detail_pk">UPDATE</button>				
									</div>
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