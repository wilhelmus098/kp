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
	if($_SESSION['jabatan'] == "PENGINJIL")
	{
		require_once('sidemenupemimpin.php');
	}		
	if($_SESSION['jabatan'] == "KOOR PUSAT" || $_SESSION['jabatan'] == "KOOR CABANG")
	{
		require_once('sidemenukoor.php');
	}
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
                        
                        <?php
							$sql = "SELECT * FROM Jemaat WHERE idJemaat='" . $idjemaat1 . "'";
							$result = mysqli_query($mysqli, $sql);
                            $idjemaat2 = "";
                            $namajemaat = "";
                            $tempatlahir = "";
                            $tanggallahir = "";
                            $alamat = "";
                            $phone = "";
                            $idgereja = "";
                            
							if ($result->num_rows > 0)
							{
								while($row1 = $result->fetch_assoc())
								{	
                                    $idjemaat2 = $row1['idJemaat'];
                                    $namajemaat = $row1['NamaJemaat'];
                                    $tempatlahir = $row1['TempatLahir'];
                                    $tanggallahir = $row1['TglLahir'];
                                    $alamat = $row1['Alamat'];
                                    $phone = $row1['NoTelp'];
                                    $idgereja = $row1['idGereja'];
								}
							}
                        ?>
                        
                        <?php
							$sql = "SELECT * FROM NotaPersembahan WHERE idNotaPersembahan='" . $idnota . "'";
							$result = mysqli_query($mysqli, $sql);
                            $idnota2 = "";
                            $pemimpin = "";
                            $tglibadah = "";
                            
							if ($result->num_rows > 0)
							{
								while($row2 = $result->fetch_assoc())
								{	
                                    $idnota2 = $row2['idNotaPersembahan'];
                                    $pemimpin = $row2['PemimpinIbadah'];
                                    $tglibadah = $row2['TglIbadah'];                      
								}
							}
						?>
						<form role="form" method="POST" action="controllers/gereja.php">
								<div class="form-group">
									<label>ID Nota</label>
                                    <input class="form-control" placeholder="" name="idnota" type="text" autofocus="" value="<?=$idnota1?>" disabled>
                                </div>
                                <div class="form-group">
									<label>Tanggal Ibadah</label>
                                    <input class="form-control" placeholder="" name="tanggal_ibadah" type="text" autofocus="" value="<?=$tglibadah?>" disabled>
								</div>
								<div class="form-group">
									<label>ID Jemaat</label>
                                    <input class="form-control" placeholder="" name="idjemaat" type="text" autofocus="" value="<?=$idjemaat2?>" disabled>
								</div>
                                <div class="form-group">
									<label>Nama Jemaat</label>
                                    <input class="form-control" placeholder="" name="idjemaat" type="text" autofocus="" value="<?=$namajemaat?>" disabled>
								</div>
								<div class="form-group">
									<label>Hari Tuhan</label>
									<input type="text" class="form-control" name="hari_tuhan" placeholder="" value="<?=$hari_tuhan?>" required>
                                </div>
                                <div class="form-group">
									<label>Perpuluhan</label>
									<input type="text" class="form-control" name="perpuluhan" placeholder="" value="<?=$perpuluhan?>" required>
                                </div>
                                <div class="form-group">
									<label>Ucapan Syukur</label>
									<input type="text" class="form-control" name="ucapan_syukur" placeholder="" value="<?=$ucapan_syukur?>" required>
                                </div>
                                <div class="form-group">
									<label>Janji Iman</label>
									<input type="text" class="form-control" name="janji_iman" placeholder="" value="<?=$janji_iman?>" required>
                                </div>
                                <div class="form-group">
									<label>Pembangunan Gereja</label>
									<input type="text" class="form-control" name="pembangunan_gereja" placeholder="" value="<?=$pembangunan_gereja?>" required>
                                </div>
                                <div class="form-group">
									<label>Lain - Lain</label>
									<input type="text" class="form-control" name="lain_lain" placeholder="" value="<?=$lain?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Cara Pembayaran</label>
                                    <select class="form-control" name="position" required>
										<option value="TUNAI" <?php if($pembayaran=='TUNAI')echo 'selected'?>>TUNAI</option>
										<option value="TRANSFER" <?php if($pembayaran=='TRANSFER')echo 'selected'?>>TRANSFER</option>
									</select>
									<!-- <input type="text" class="form-control" name="cara_pembayaran" placeholder="" value="<?=$pembayaran?>"> -->
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