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
                            $idnota = $_GET['idnota'];
                            $idjemaat = $_GET['idjemaat'];
							$sql = "SELECT * FROM DetailNotaPersembahan WHERE idNotaPersembahan='" . $idnota . "' AND idJemaat='" . $idjemaat . "'";
							$result = mysqli_query($mysqli, $sql);
                            $idnota1 = "";
                            $idjemaat = "";
                            $hari_tuhan = "";
                            $perpuluhan = "";
                            $ucapan_syukur = "";
                            $janji_iman = "";
                            $pembangunan_gereja = "";
                            $lain = "";
                            $pembayaran = "";
                            
							if ($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
								{	
                                    $idnota1 = $row['idNotaPersembahan'];
                                    $idjemaat1 = $row['idJemaat'];
                                    $hari_tuhan = $row['PK_HariTuhan'];
                                    $perpuluhan = $row['PK_Perpuluhan'];
                                    $ucapan_syukur = $row['PK_UcapanSyukur'];
                                    $janji_iman = $row['PK_JanjiIman'];
                                    $pembangunan_gereja = $row['PK_PembangunanGereja'];
                                    $lain = $row['PK_LainLain'];
                                    $pembayaran = $row['CaraPembayaran'];
								}
							}
						?>
						<form role="form" method="POST" action="controllers/gereja.php">
								<div class="form-group">
									<label>ID Nota</label>
                                    <input class="form-control" placeholder="" name="idnota" type="text" autofocus="" value="<?=$idnota1?>">
								</div>
								<div class="form-group">
									<label>ID Jemaat</label>
                                    <input class="form-control" placeholder="" name="idjemaat" type="text" autofocus="" value="<?=$idjemaat1?>">
								</div>
								
								<div class="form-group">
									<label>Hari Tuhan</label>
									<input type="text" class="form-control" name="hari_tuhan" placeholder="" value="<?=$hari_tuhan?>">
                                </div>
                                <div class="form-group">
									<label>Perpuluhan</label>
									<input type="text" class="form-control" name="perpuluhan" placeholder="" value="<?=$perpuluhan?>">
                                </div>
                                <div class="form-group">
									<label>Ucapan Syukur</label>
									<input type="text" class="form-control" name="ucapan_syukur" placeholder="" value="<?=$ucapan_syukur?>">
                                </div>
                                <div class="form-group">
									<label>Janji Iman</label>
									<input type="text" class="form-control" name="janji_iman" placeholder="" value="<?=$janji_iman?>">
                                </div>
                                <div class="form-group">
									<label>Pembangunan Gereja</label>
									<input type="text" class="form-control" name="pembangunan_gereja" placeholder="" value="<?=$pembangunan_gereja?>">
                                </div>
                                <div class="form-group">
									<label>Lain - Lain</label>
									<input type="text" class="form-control" name="lain_lain" placeholder="" value="<?=$lain?>">
                                </div>
                                <div class="form-group">
									<label>Cara Pembayaran</label>
									<input type="text" class="form-control" name="cara_pembayaran" placeholder="" value="<?=$pembayaran?>">
								</div>
								<button type="submit" class="btn btn-primary" name="edit_gereja">Update Detail Nota</button>
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