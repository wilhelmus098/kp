<!DOCTYPE html>
<?php
	include 'conn.php';
	include 'checksession.php';
	
	$limit = 4;  
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
	$start_from = ($page-1) * $limit;  

	$sql = "SELECT * FROM Jemaat j INNER JOIN Gereja g on j.idGereja = g.idGereja WHERE j.idGereja = '" . $_SESSION['idgereja'] . "' ORDER BY idJemaat ASC LIMIT $start_from, $limit";
	$result = mysqli_query($mysqli, $sql);  
	?>
	
?>
<html>
<head>
	<link rel="stylesheet" href="pag/dist/simplePagination.css" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    </script>

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
				<li class="active">LIST JEMAAT</li>
			</ol>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
			<div class="text-center" style="margin: 8px;">
				<button class='btn btn-primary m-2' style="width:200px" onclick="window.location.href='create_jemaat.php'">TAMBAH JEMAAT</button>
			</div>
				<div class="panel panel-default"  id="section-to-print">
					<div class="panel-body">
						<div class="col-md-12">
							<form method="POST" action=controllers/jemaat.php>
							<table class="table table-hover">
								<thead>
								  <tr>
								  	<th>ID JEMAAT</th>
									<th>NAMA JEMAAT</th>
									<th>TEMPAT LAHIR</th>
									<th>TANGGAL LAHIR</th>
									<th>ALAMAT</th>
									<th>NOMOR TELEPON</th>
									<th>JEMAAT GBA</th>
									<th>ACTION</th>									
								  </tr>
								</thead>
								<tbody>
								<?php
									//$sql = "SELECT * FROM Jemaat j INNER JOIN Gereja g on j.idGereja = g.idGereja WHERE j.idGereja = '" . $_SESSION['idgereja'] . "' ORDER BY NamaJemaat ASC";
									//$result = mysqli_query($mysqli, $sql);
								?>

								<?php while($row = $result->fetch_assoc()) { ?>
									<tr>
										<td><?=$row["idJemaat"]?></td>
										<td><?=$row["NamaJemaat"]?></td>
										<td><?=$row["TempatLahir"]?></td>
										<td><?=$row["TglLahir"]?></td>
										<td><?=$row["Alamat"]?></td>
										<td><?=$row["NoTelp"]?></td>
										<td><?=$row["Nama"]?></td> 
										<td>
											<button type="submit" class="btn btn-success" name="edit_jemaat" value="<?=$row["idJemaat"]?>"><i class="glyphicon glyphicon-edit"></i></i></button>

											<button type="submit" class="btn btn-danger" id="delete" name="delete_jemaat" value="<?=$row["idJemaat"]?>"><i class="glyphicon glyphicon-trash"></i></button> 
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
		<?php  
			$sql = "SELECT COUNT(idGereja) FROM Gereja";  
			$rs_result = mysqli_query($mysqli, $sql);  
			$row = mysqli_fetch_row($rs_result);  
			$total_records = $row[0];  
			$total_pages = ceil($total_records / $limit);  
			$pagLink = "<nav><ul class='pagination'>";  
			for ($i=1; $i<=$total_pages; $i++) 
			{  
			    $pagLink .= "<li><a href='list_jemaat.php?page=".$i."'>".$i."</a></li>";  
			};  
			echo $pagLink . "</ul></nav>";  
		?>		
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/swal2/sweetalert2.min.js"></script>
	<script src="pag/dist/jquery.simplePagination.js"></script>

	<script>
        function myFunction() {
            var printContents = document.getElementById("section-to-print").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            return true;
        }

        $(document).ready(function(){
			$('.pagination').pagination({
			        items: <?php echo $total_records;?>,
			        itemsOnPage: <?php echo $limit;?>,
			        cssStyle: 'light-theme',
					currentPage : <?php echo $page;?>,
					hrefTextPrefix : 'list_jemaat.php?page='
			    });
		});

        $(document).on('click', '#delete_jemaat', function(e)
        {
			var jemaatId = $(this).data('id');
			SwalDelete(jemaatId);
			e.preventDefault();
		});
		
		function SwalDelete(jemaatId)
		{
				swal({
				title: 'Are you sure?',
				text: "It will be deleted permanently!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!',
				showLoaderOnConfirm: true,
				  
				preConfirm: function() {
				  return new Promise(function(resolve) {
				       
				     $.ajax({
				   		url: 'controllers/jemaat.php',
				    	type: 'POST',
				       	data: 'delete='+jemaatId,
				       	dataType: 'json'
				     })
				     .done(function(response){
				     	swal('Deleted!', response.message, response.status);
						readProducts();
				     })
				     .fail(function(){
				     	swal('Oops...', 'Something went wrong with ajax !', 'error');
				     });
				  });
			    },
				allowOutsideClick: false			  
			});	
		
		}
	
    </script>
		
</body>
</html>