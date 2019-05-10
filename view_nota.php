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
				<li class="active">VIEW NOTA PERSEMBAHAN</li>
			</ol>
	</div><!--/.row-->

	<div class="row">
			<div class="col-lg-12">	
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-6">
                        <?php
							$idnota = $_GET["idnota"];
							$sql = "SELECT * FROM NotaPersembahan WHERE idNotaPersembahan = '" .$idnota . "'";
							$result = mysqli_query($mysqli, $sql);
							$idnota1 = "";
                            $pemimpinibadah1 = "";
                            $tglibadah1 = "";
                            $hadir1 = "";
                            $harituhan1 = "";
                            $sm1 = "";
                            $tgldoatengahminggu1 = "";
                            $doatengahminggu1 = "";
                            $gtotal1 = "";
                            $bendahara1 = "";
                            $penghitung1 = "";
                            $status1 = "";
                            $idgereja1 = "";
                            $sumpersembahanumum = "";
							if ($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
								{
									$idnota1 = "";
		                            $pemimpinibadah1 = $row["PemimpinIbadah"];
		                            $tglibadah1 = $row["TglIbadah"];
		                            $hadir1 = $row["JumlahHadir"];
		                            $harituhan1 = $row["HariTuhan"];
		                            $sm1 = $row["SekolahMinggu"];
		                            $tgldoatengahminggu1 = $row["TglDoaTengahMinggu"];
		                            $doatengahminggu1 = $row["DoaTengahMinggu"];
		                            $gtotal1 = $row["GrandTotal"];
		                            $bendahara1 = $row["Bendahara"];
		                            $penghitung1 = $row["Penghitung"];
		                            $status1 = $row["Verified"];
		                            $idgereja1 = $row["idGereja"];
								}
							}
							$sumpersembahanumum = $harituhan1 + $sm1 + $doatengahminggu1
						?>
						<?php
							$sql0 = "SELECT (SUM(PK_HariTuhan)+SUM(PK_Perpuluhan)+SUM(PK_UcapanSyukur)+SUM(PK_JanjiIman)+SUM(PK_PembangunanGereja)+SUM(PK_LainLain)) as totalkhusus FROM DetailNotaPersembahan WHERE idNotaPersembahan ='" . $idnota . "'";
							$result0 =  mysqli_query($mysqli, $sql0);
							$sumpersembahankhusus = "";
							if($result0->num_rows > 0)
							{
								while($row0 = $result0->fetch_assoc())
								{
									$sumpersembahankhusus = $row0['totalkhusus'];
								}
							}
						?>
						<form role="form" method="POST" action="controllers/persembahan.php">
									<div class="form-group">
										<label>Tanggal Ibadah</label>
										<input type="date" class="form-control" name="tgl_ibadah" value="<?=$tglibadah1?>" disabled>
									</div>

									<div class="form-group">
										<label>Pemimpin Ibadah</label>
                                        <input type="text" class="form-control" name="pemimpin_ibadah" value="<?=$pemimpinibadah1?>" disabled>
									</div>

									<div class="form-group">
										<label>Jumlah Hadir</label>
										<input type="text" class="form-control" name="jumlah_hadir" value="<?=$hadir1?>" disabled>
									</div>

									<div class="form-group">
										<label>Persembahan Tanpa Nama</label>
										<input type="text" class="form-control" name="persembahan_tanpa_nama" value="<?=$harituhan1?>" disabled>
									</div>

									<div class="form-group">
										<label>Persembahan Sekolah Minggu</label>
										<input type="text" class="form-control" name="persembahan_sm" value="<?=$sm1?>" disabled>
									</div>

									<div class="form-group">
										<label>Tanggal Doa Tengah Minggu</label>
										<input type="date" class="form-control" name="tgl_doa_tengah_minggu" value="<?=$tgldoatengahminggu1?>" disabled>
									</div>

									<div class="form-group">
										<label>Persembahan Doa Tengah Minggu</label>
										<input type="text" class="form-control" name="persembahan_tengah_minggu" value="<?=$doatengahminggu1?>" disabled>
									</div>

									<div class="form-group">
										<label>Bendahara</label>
                                        <input type="text" class="form-control" name="bendahara" value="<?=$bendahara1?>" disabled>
									</div>

									<div class="form-group">
										<label>Petugas Penghitung</label>
                                        <input type="text" class="form-control" name="penghitung" value="<?=$penghitung1?>" disabled>
									</div>
									<?php
										$grandtotal = $sumpersembahankhusus + $sumpersembahanumum;
									?>
									<div class="form-group">
										<label>Total Keseluruhan Persembahan</label>
										<input type="text" class="form-control" name="total_seluruh_persembahan" value="<?=$grandtotal?>" disabled="true">
									</div>

									<table class="table table-hover">
										<thead>
										  <tr>
										  	<th>ID Jemaat</th>
											<th>Nama Jemaat</th>
											<th>Hari Tuhan</th>
											<th>Perpuluhan</th>
											<th>Ucapan Syukur</th>
											<th>Pembangunan Gereja</th>
											<th>Lain - lain</th>
                                            <th>Cara Bayar</th>
											<th>ACTION</th>
										  </tr>
										</thead>
										<tbody>
										<?php
											$sql = "SELECT * FROM DetailNotaPersembahan, Jemaat WHERE idNotaPersembahan='" .$idnota. "' AND DetailNotaPersembahan.idJemaat=Jemaat.idJemaat";
											$result = mysqli_query($mysqli, $sql);
										?>	
										<?php while($row2 = $result->fetch_assoc()) { ?>
											<tr>
                                                <td><?=$row2["idJemaat"]?></td>
												<td><?=$row2["NamaJemaat"]?></td>
												<td><?=$row2["PK_HariTuhan"]?></td>
												<td><?=$row2["PK_Perpuluhan"]?></td>
                                                <td><?=$row2["PK_UcapanSyukur"]?></td>
                                                <td><?=$row2["PK_JanjiIman"]?></td>
                                                <td><?=$row2["PK_PembangunanGereja"]?></td>
                                                <td><?=$row2["PK_LainLain"]?></td>
                                                <td><?=$row2["CaraPembayaran"]?></td>
											</tr>
										<?php } ?>
										</tbody>
						  			</table>

									<div class="form-group">
										<label>Verfied</label>
										<select class="form-control" name="status_verifikasi" <?php if($_SESSION['jabatan']=="BENDAHARA")echo 'disabled'?>>
											<option value="YES">YES</option>
											<option value="NO" <?php if($_SESSION['jabatan']=="BENDAHARA")echo 'selected'?>>NO</option>
										</select>
									</div>
									<?php
										if($_SESSION['jabatan'] != "BENDAHARA")
										{
											echo "<button type='submit' class='btn btn-primary' name='btn_edit_nota' value='$idnota'>SAVE</button>";
										}
									?>
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