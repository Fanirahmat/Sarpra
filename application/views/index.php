<!doctype html>
<html lang="en">

<head>
	<title>SarPra</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>assets/img/favicon.png">
	<script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="<?=base_url()?>index.php/Dashboard"><img src="<?=base_url()?>assets/img/logo-dark.png" alt="Sarpra Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
			<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>

				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $this->session->userdata('username'); ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?=base_url()?>index.php/Logout"><i class="lnr lnr-exit"></i><span>Logout</span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>	
          
		
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
				    <?php
						if($this->session->userdata('nama_level') =='Admin'){
					?>
					<ul class="nav">
						<li><a href="<?=base_url()?>index.php/Dashboard" class=""><i class="lnr lnr-home"></i> 
						<span>Dashboard</span></a></li>	
					</ul>
					<!-- <ul class="nav">
						<li><a href="<?=base_url()?>index.php/Level" class=""><i class="glyphicon glyphicon-stats"></i> 
						<span>Level</span></a></li>	
					</ul> -->
					<ul class="nav">
						<li><a href="<?=base_url()?>index.php/Jenis" class=""><i class="glyphicon glyphicon-th-large"></i> 
						<span>Jenis</span></a></li>	
					</ul>
					<ul class="nav">
						<li><a href="<?=base_url()?>index.php/Ruang" class=""><i class="glyphicon glyphicon-folder-open"></i> 
						<span>Ruang</span></a></li>	
					</ul>
					<ul class="nav">
						<li><a href="<?=base_url()?>index.php/Inventaris" class=""><i class="glyphicon glyphicon-piggy-bank"></i> 
						<span>Inventaris</span></a></li>	
					</ul>
					
					<ul class="nav">
						<li><a href="<?=base_url()?>index.php/Peminjaman" class=""><i class="glyphicon glyphicon-transfer"></i> 
						<span>Peminjaman</span></a></li>	
					</ul>
					<ul class="nav">
						<li><a href="<?=base_url()?>index.php/Petugas" class=""><i class="glyphicon glyphicon-user"></i> 
						<span>Petugas</span></a></li>	
					</ul>
					<ul class="nav">
						<li><a href="<?=base_url()?>index.php/Pegawai" class=""><i class="glyphicon glyphicon-user"></i> 
						<span>Pegawai</span></a></li>	
					</ul>
					
					<?php
						} elseif ($this->session->userdata('nama_level') == 'Operator') {
					?>
						<ul class="nav">
						<li><a href="<?=base_url()?>index.php/Peminjaman" class=""><i class="glyphicon glyphicon-transfer"></i> 
						<span>Peminjaman</span></a></li>	
					    </ul>
						<?php
						}
						?>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
				<?php
			    $this->load->view($konten);
				?>
					<!-- OVERVIEW -->
					</div>
                    </div>		
					</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->

	<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?=base_url()?>assets/scripts/klorofil-common.js"></script>
	
</body>

</html>
