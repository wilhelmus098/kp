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
				<li class="active">CREATE DETAIL RECEIPT!</li>
			</ol>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
			<!-- <div class="text-center" style="margin: 8px;">
				<button onclick='myFunction()'  class='btn btn-primary m-2' style="width:200px">Print</button>
			</div> -->
				<div class="panel panel-default"  id="section-to-print">
					<div class="panel-body">
						<div class="col-md-12">
							<form role="form" method="POST" action="controllers/persembahan.php">
									<div class="form-group">
										<label>ID NOTA</label>	
										<select></select>
									</div>

									<div class="form-group">
										<label>NAMA JEMAAT</label>
										<select class="form-control" name="nama_jemaat">
											<?php
												$sql = "select * from Jemaat WHERE idGereja = '" . $_SESSION["idgereja"] . "'";
												$result = mysqli_query($mysqli, $sql);
												if($result->num_rows > 0)
												{
													while($row = $result->fetch_assoc())
													{
														echo "<option value=\"". $row['idGereja'] ."\" selected >".$row["idGereja"]." - ".$row["NamaJemaat"]."</option>";
													}
												}
											?>
										</select>	
									</div>

									<div class="form-group">
										<label>HARI TUHAN</label>
										<input type="text" class="form-control" name="nilai_hari_tuhan" placeholder="RP.">
									</div>

									<div class="form-group">
										<label>PERPULUHAN</label>
										<input type="text" class="form-control" name="nilai_perpuluhan" placeholder="RP.">
									</div>

									<div class="form-group">
										<label>UCAPAN SYUKUR</label>
										<input type="text" class="form-control" name="nilai_ucapan_syukur" placeholder="RP.">
									</div>

									<div class="form-group">
										<label>JANJI IMAN</label>
										<input type="text" class="form-control" name="nilai_janji_iman" placeholder="RP.">
									</div>

									<div class="form-group">
										<label>PEMBANGUNAN GEREJA</label>
										<input type="text" class="form-control" name="nilai_pembangunan_gereja" placeholder="RP.">
									</div>

									<div class="form-group">
										<label>LAIN - LAIN</label>
										<input type="text" class="form-control" name="nilai_lain" placeholder="RP.">
									</div>

									<div class="text-center" style="margin: 8px">
										<button class='btn btn-primary m-2' style="width:200px" value="<?=$currentid?>" name="btn_detail_persembahan">SAVE</button>				
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