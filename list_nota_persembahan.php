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
				<li class="active">CREATE NEW RECEIPT!</li>
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
						<form method="POST" action=controllers/persembahan.php>
							<!-- <input type="hidden" name="idnotapersembahan" value="<?=$idNotaPersembahan?>"> -->
							<div class="text-center" style="margin: 8px">
								<button class='btn btn-primary m-2' style="width:200px" name="btn_create_nota">CREATE NEW</button>				
							</div>
							<table class="table table-hover">
								<thead>
								  <tr>
								  	<th>ID Nota</th>
									<th>TANGGAL IBADAH</th>
									<th>PEMIMPIN</th>
									<th>VERIFIKASI</th>
									<th>ACTION</th>
								  </tr>
								</thead>
								<tbody>
								<?php
									//NAMPILINNYA DARI YANG PALING TERAKHIR DIINSERT
									$sql = "SELECT * FROM NotaPersembahan ORDER BY idNotaPersembahan DESC";
									$result = mysqli_query($mysqli, $sql);
								?>	
								<?php while($row = $result->fetch_assoc()) { ?>
									<tr>
										<td><?=$row["idNotaPersembahan"]?></td>
										<td><?=$row["TglIbadah"]?></td>
										<td><?=$row["PemimpinIbadah"]?></td>
										<td><?=$row["Verified"]?></td>
										<td>
											<button type="submit" class="btn btn-primary" name="btn_view" >DETAIL</button>
											<button type="submit" class="btn btn-primary" name="btn_edit" value="edit_nota_persembahan.php?idnotapersembahan=<?="$row["idNotaPersembahan"]"?>">EDIT</button>
											<button type="submit" class="btn btn-primary" name="btn_delete" >DELETE</button>
										</td>
									</tr>
								<?php } ?>
								</tbody>
						  </table>
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