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
	if($_SESSION['user_position'] == "Actress")
	{
		require_once('sidemenuartis.php');
	}
	if($_SESSION['user_position'] == "Manager")
	{
		require_once('sidemenumanager.php');
	}
	if($_SESSION['user_position'] == "Admin")
	{
		require_once('sidemenu.php');
	}
		
	?>
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">List Schedule</li>
			</ol>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
			<div class="text-center" style="margin: 8px;">
				<button onclick='myFunction()'  class='btn btn-primary m-2' style="width:200px">Print</button>
			</div>
			<div class="panel panel-default"  id="section-to-print">
					<div class="panel-body">
						<div class="col-md-12">
							<table class="table table-hover">
								<thead>
								  <tr>
									<th>Username</th>
									<th>Position</th>
									<th></th>
								  </tr>
								</thead>
								<tbody>
								<?php
									$sql = "select * from users";
									$result = mysqli_query($mysqli, $sql);
										// output data of each row
								?>	
								<?php while($row = $result->fetch_assoc()) { ?>
									<tr>
										<td><a href="edit_user.php?iduser=<?=$row["iduser"]?>"><?=$row["user_name"]?></a></td>
										<td><?=$row["user_position"]?></td>
										<td></td>
									</tr>
								<?php } ?>
								  
								</tbody>
						  </table>
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