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
				<li class="active">List Gereja</li>
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
							<form method="POST" action=controllers/gereja.php>
							<table class="table table-hover">
								<thead>
								  <tr>
								  	<th>ID GEREJA</th>
									<th>JENIS GEREJA</th>
									<th>KOTA GEREA
									<th>ALAMAT GEREJA</th>
									<th>ACTION</th>
								  </tr>
								</thead>
								<tbody>
								<?php
									$sql = "SELECT * FROM Gereja";
									$result = mysqli_query($mysqli, $sql);
									// output data of each row
								?>	
								<?php while($row = $result->fetch_assoc()) { ?>
									<tr>
										<td><?=$row["idGereja"]?></td>
										<td><?=$row["JenisGereja"]?></td>
										<td><?=$row["Nama"]?></td>
										<td><?=$row["AlamatGereja"]?></td>
										<td>
											<button type="submit" class="btn btn-success" name="edit_gereja" value="<?=$row["idGereja"]?>"><i class="glyphicon glyphicon-edit"></i></button>
										</td>
									</tr>
								<?php } ?>
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

        // $('.table tbody').onclick('click', '#delete', function()
        // {
        // 	$(this).closest('tr').remove();
        // });
    </script>
		
</body>
</html>