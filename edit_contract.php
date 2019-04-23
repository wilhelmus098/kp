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
				<li class="active">Edit Contract</li>
			</ol>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
								
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-6">
						<?php
							$idcontract = $_GET['idcontract'];
							$sql = "select idcontract, contract_iduser, contract_start, contract_end, contract_value, user_name from contracts, users where idcontract='" . $idcontract . "' AND iduser = contract_iduser";
							$result = mysqli_query($mysqli, $sql);
							$contractId = "";
							$contractIduser = "";
							$contractStart = "";
							$contractEnd = "";
							$contractValue = "";
							if ($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
								{
									$contractId = $row["idcontract"];
									$contractIduser = $row["contract_iduser"];
									$time = strtotime($row["contract_start"]);
									$contractStart = date('Y-m-d',$time);
									$time = strtotime($row["contract_end"]);
									$contractEnd = date('Y-m-d',$time);
									$contractValue = $row['contract_value'];
								}
							}
						?>
							<form role="form" method="POST" action="controllers/contract.php">
									<div class="form-group">
                                        <label>Contract ID</label>
                                        <input class="form-control" placeholder="" name="contract_id" type="username" autofocus="" value="<?=$contractId?>">
									</div>
									<div class="form-group">
                                        <label>Contract User</label>
                                        <input class="form-control" placeholder="" name="contract_user" type="username" autofocus="" value="<?=$contractIduser?>">
									</div>
									
									<div class="form-group">
										<label>Contract Start</label>
                                        <input type="date" class="form-control" name="contract_start" placeholder="" value="<?=$contractStart?>">
									</div>
									<div class="form-group">
										<label>Contract End</label>
                                        <input type="date" class="form-control" name="contract_end" placeholder="" value="<?=$contractEnd?>">
									</div>

									<div class="form-group">
										<label>Contract Value</label>
                                        <input type="text" class="form-control" name="contract_value" placeholder="" value="<?=$contractValue?>">
									</div>
									<button type="submit" class="btn btn-primary" name="edit_contract" >Update Contract</button>
									<button type="submit" class="btn btn-primary" name="delete_contract" >Delete Contract</button>
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