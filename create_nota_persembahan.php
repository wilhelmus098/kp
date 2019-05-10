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
				<li class="active">CREATE NEW RECEIPT!</li>
			</ol>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default"  id="section-to-print">
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="POST" action="controllers/persembahan.php">
									<div class="form-group">
										<label>Tanggal Ibadah</label>
										<input type="date" class="form-control" name="tgl_ibadah" placeholder="">
									</div>

									<div class="form-group">
										<label>Pemimpin Ibadah</label>
										<select class="form-control" name="nama_pemimpin">
											<?php
												$sql = "SELECT * FROM User u WHERE u.Jabatan != 'BENDAHARA' AND u.idGereja =  '" . $_SESSION['idgereja'] . "' OR u.Jabatan = 'PENDETA' ";
												$result = mysqli_query($mysqli, $sql);
												if($result->num_rows > 0)
												{
													while($row = $result->fetch_assoc())
													{
														echo "<option value=\"". $row['uname'] ."\" selected >".$row["uname"]." - ".$row["Jabatan"]."</option>";
													}
												}
											?>
										</select>
									</div>

									<div class="form-group">
										<label>Jumlah Hadir</label>
										<input type="text" class="form-control" name="jumlah_hadir" placeholder="">
									</div>

									<div class="form-group">
										<label>Persembahan Tanpa Nama</label>
										<input type="text" class="form-control" name="persembahan_tanpa_nama" placeholder="">
									</div>

									<div class="form-group">
										<label>Persembahan Sekolah Minggu</label>
										<input type="text" class="form-control" name="persembahan_sm" placeholder="">
									</div>

									<div class="form-group">
										<label>Tanggal Doa Tengah Minggu</label>
										<input type="date" class="form-control" name="tgl_doa_tengah_minggu" placeholder="">
									</div>

									<div class="form-group">
										<label>Persembahan Doa Tengah Minggu</label>
										<input type="text" class="form-control" name="persembahan_tengah_minggu" placeholder="">
									</div>

									<!-- <div class="form-group">
										<label>Bendahara</label>
										<select class="form-control" name="bendahara">
											<?php
												$sql = "SELECT * FROM User WHERE Jabatan = 'BENDAHARA'";
												$result = mysqli_query($mysqli, $sql);
												if($result->num_rows > 0)
												{
													while($row = $result->fetch_assoc())
													{
														echo "<option value=\"". $row['uname'] ."\" selected >".$row["uname"]." - ".$row["Jabatan"]."</option>";
													}
												}
											?>
										</select>
									</div> -->

									<div class="form-group">
										<label>Petugas Penghitung</label>
										<select class="form-control" name="petugas_penghitung">
											<?php
												$sql = "SELECT * FROM Jemaat j WHERE j.idGereja = '" . $_SESSION['idgereja'] . "'";
												$result = mysqli_query($mysqli, $sql);
												//echo $sql;
												if($result->num_rows > 0)
												{
													while($row = $result->fetch_assoc())
													{
														echo "<option value=\"". $row['idJemaat'] ."\" selected >".$row["NamaJemaat"]."</option>";
														//echo $sql;
													}
												}
											?>
										</select>
									</div>

									<!-- <div class="form-group">
										<label>Gereja</label>
										<select class="form-control" name="id_gereja">
											<?php
												$sql = "SELECT * FROM Gereja";
												$result = mysqli_query($mysqli, $sql);
												if($result->num_rows > 0)
												{
													while($row = $result->fetch_assoc())
													{
														echo "<option value=\"". $row['idGereja'] ."\" selected >".$row["JenisGereja"]." - ".$row["AlamatGereja"]."</option>";
													}
												}
											?>
										</select>	
									</div> -->

									<!-- <div class="form-group">
										<label>Verfied</label>
										<select class="form-control" name="status_verifikasi" disabled>
											<option value="YES">YES</option>
											<option value="NO">NO</option>
										</select>
									</div>

									<div class="form-group">
										<label>Total Keseluruhan Persembahan</label>
										<input type="text" class="form-control" name="total_seluruh_persembahan" disabled="true">
									</div> -->

									<?php
										$sql = "SELECT  MAX(n.idNotaPersembahan) as lastid FROM NotaPersembahan n ";
										$result = mysqli_query($mysqli, $sql);
										$idterakhir = "";
										if($result->num_rows > 0)
										{
											while($row = $result->fetch_assoc())
											{
												$idterakhir = $row["lastid"]; 
											}
										}
									?>
									<button class='btn btn-primary m-2' style="width:200px"  type="submit" name="btn_insert_nota" value="<?=$idterakhir?>">SAVE</button>
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
	<script>
        function myFunction() {
            var printContents = document.getElementById("section-to-print").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            return true;
        }
    </script>
</body>
</html>