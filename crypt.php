<!DOCTYPE html>
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
							<form role="form" method="POST" action="crypt.php">
									<div class="form-group">
                                        <label>PASS</label>
                                        <input class="form-control" placeholder="" name="user_input" type="username" autofocus="" value="">
									</div>
									<div class="form-group">
                                        <label>SALT</label>
                                        <input class="form-control" placeholder="" name="salt" type="username" autofocus="" value="">
									</div>
									<button type="submit" class="btn btn-primary" name="encrypt" >ENCRYPT</button>
							</form>

                            <?php 
                                if(isset($_POST['user_input']))
                                {             
                                    $user_input = $_POST['user_input'];
                                    $hashed_password = crypt('mypassword','aa');
                                    if (hash_equals($hashed_password, crypt($user_input, $hashed_password))) 
                                    {
                                        echo "Password verified!";
                                    }
                                    else
                                    {
                                        echo "Wrong";
                                    }
                                }
                            ?>
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