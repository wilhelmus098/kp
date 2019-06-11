
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Laporan </span>Persembahan</a>
				<div class="navbar-brand nav navbar-top-links navbar-right" href="#">
				
					<span>Jabatan : </span>
					<?php
						if (isset($_SESSION["user_logged_in"]))
						{
							echo $_SESSION["jabatan"];
						}	
					?>
					
				</div>
				<div class="navbar-brand nav navbar-top-links navbar-right" href="#">
				
					<span>Username : </span>
					<?php
						if (isset($_SESSION["user_logged_in"]))
						{
							echo $_SESSION["uname"];
						}	
					?>
					
				</div>
				
				
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<div class="divider"></div>
		
		<ul class="nav menu">
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-navicon">&nbsp;</em> Gereja <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="list_gereja.php">
						<span class="fa fa-arrow-right">&nbsp;</span> List Gereja
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-4">
				<em class="fa fa-navicon">&nbsp;</em> Jemaat <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-4">
					<li><a class="" href="create_jemaat.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Create Jemaat
					</a></li>
					<li><a class="" href="list_jemaat.php">
						<span class="fa fa-arrow-right">&nbsp;</span> List Jemaat
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-navicon">&nbsp;</em> Users <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li><a class="" href="update_user.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Change Password
					</a></li>
				</ul>
			</li>
		
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	