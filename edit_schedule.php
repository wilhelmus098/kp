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
				<li class="active">Create Schedule</li>
			</ol>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
				
				
				
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-6">
                        <?php
							$idschedules = $_GET['idschedule'];
							$sql = "select idschedule, schedule_start, schedule_end, schedule_location, schedule_desc, schedule_iduser, user_name from schedules, users where idschedule='" . $idschedules . "' AND schedule_iduser = iduser";
							$result = mysqli_query($mysqli, $sql);
							$idschedule = "";
                            $scheduleStart = "";
                            $scheduleEnd = "";
                            $scheduleLoc = "";
                            $scheduleDesc = "";
                            $scheduleIduser = "";
                            
							if ($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
								{	
									$idschedule = $row["idschedule"];
                                    $time = strtotime($row["schedule_start"]);
                                    $scheduleStart = date('Y-m-d\Th:i',$time);
                                    $time1 = strtotime($row["schedule_end"]);
                                    $scheduleEnd = date('Y-m-d\Th:i',$time1);
									
									$cipherloc = $row["schedule_location"];
									$mc = new MagicCrypt('isa', 256);
									$plainloc = $mc->decrypt($cipherloc);

									$scheduleLoc = $plainloc;
                                    $scheduleDesc = $row["schedule_desc"];
                                    $scheduleIduser = $row["schedule_iduser"];
								}
							}
						?>
							<form role="form" method="POST" action="controllers/schedule.php">
									<div class="form-group">
										<label>Schedule ID</label>
                                        <input class="form-control" placeholder="" name="schedule_id" type="text" autofocus="" value="<?=$idschedule?>">
									</div>
									<div class="form-group">
										<label>Schedule User</label>
                                        <input class="form-control" placeholder="" name="schedule_user" type="username" autofocus="" value="<?=$scheduleIduser?>">
									</div>
									
									<div class="form-group">
										<label>Schedule Start</label>
										<input type="datetime-local" class="form-control" name="schedule_start" placeholder="" value="<?=$scheduleStart?>">
									</div>
									<div class="form-group">
										<label>Schedule End</label>
										<input type="datetime-local" class="form-control" name="schedule_end" placeholder="" value="<?=$scheduleEnd?>">
									</div>
									<div class="form-group">
										<label>Schedule Location</label>
										<input type="text" class="form-control" name="schedule_location" placeholder="" value="<?=$scheduleLoc?>">
									</div>
									<div class="form-group">
										<label>Schedule Description</label>
										<input type="text" class="form-control" name="schedule_desc" placeholder="" value="<?=$scheduleDesc?>">
									</div>
									
									<button type="submit" class="btn btn-primary" name="edit_schedule">Update Schedule</button>
									<button type="submit" class="btn btn-primary" name="delete_schedule">Delete Schedule</button>
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