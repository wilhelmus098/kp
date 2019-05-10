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
				<li class="active">Edit Jemaat</li>
			</ol>
	</div><!--/.row-->

	<div class="row">
			<div class="col-lg-12">	
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-6">
                        <?php
							$idJemaat = $_GET['idjemaat'];
							$sql = "SELECT * FROM Jemaat WHERE idJemaat='" . $idJemaat . "'";
							$result = mysqli_query($mysqli, $sql);
							$idjemaat1 = "";
                            $namajemaat1 = "";
                            $tempatlahir1 = "";
                            $tanggallahir1 = "";
                            $alamat1 = "";
                            $nomor1 = "";
                            $idgereja1 = "";
                            
							if ($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
								{	
                                    $idjemaat1 = $row["idJemaat"];
			                        $namajemaat1 = $row["NamaJemaat"];
			                        $tempatlahir1 = $row["TempatLahir"];
			                        $tanggallahir1 = $row["TglLahir"];
			                        $alamat1 = $row["Alamat"];
			                        $nomor1 = $row["NoTelp"];
			                        $idgereja1 = $row["idGereja"];
								}
							}
						?>
						<form role="form" method="POST" action="controllers/jemaat.php">
								<div class="form-group">
									<label>ID Jemaat</label>
                                    <input class="form-control" placeholder="" name="idjemaat" type="text" autofocus="" value="<?=$idjemaat1?>">
								</div>

								<div class="form-group">
									<label>Nama</label>
									<input type="text" class="form-control" name="nama_jemaat" value="<?=$namajemaat1?>">
								</div>

								<div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" class="form-control" name="tempat_lahir" value="<?=$tempatlahir1?>">
								</div>

								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" class="form-control" name="tgl_lahir" value="<?=$tanggallahir1?>">
								</div>

								<div class="form-group">
									<label>Alamat</label>
									<input type="text" class="form-control" name="alamat_jemaat" value="<?=$alamat1?>">
								</div>

								<div class="form-group">
									<label>Nomor Telepon</label>
									<input type="text" class="form-control" name="nomor_jemaat" value="<?=$nomor1?>">
								</div>

								<div class="form-group">
									<label>Berjemaat di Gereja: </label>
										<select class="form-control" name="gereja_jemaat_id">
											<?php
												$sql = "select * from Gereja";
												$result = mysqli_query($mysqli, $sql);
												if($result->num_rows > 0)
												{
													while($row = $result->fetch_assoc())
													{
														if($idgereja1==$row['idGereja'])
														{
															echo "<option value=\"". $row['idGereja'] ."\" selected >".$row["JenisGereja"]." - ".$row["Nama"]."</option>";
														}
														else
														{
															echo "<option value=\"". $row['idGereja'] ."\">".$row["JenisGereja"]." - ".$row["Nama"]."</option>";
														}
													}
												}
											?>
									</select>
								</div>

								<button type="submit" class="btn btn-success" name="btn_edit_jemaat">UPDATE</button>
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