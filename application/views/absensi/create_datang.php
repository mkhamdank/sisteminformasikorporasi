<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Tahu Crispy</title>

		<!-- Bootstrap CSS -->
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container-fluid">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Tahu Crispy</a>
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="<?php echo site_url('Admin') ?>">SDM</a></li>
							<li><a href="<?php echo site_url('Produk') ?>">Produk</a></li>
							<li><a href="<?php echo site_url('Supplier') ?>">Supplier</a></li>
							<li><a href="<?php echo site_url('Bahan') ?>">Bahan</a></li>
							<li><a href="<?php echo site_url('Pelanggan') ?>">Pelanggan</a></li>
							<li><a href="<?php echo site_url('Pemasukan') ?>">Pemasukan</a></li>
							<li><a href="<?php echo site_url('Pengeluaran') ?>">Pengeluaran</a></li>
							<li><a href="<?php echo site_url('Produksi') ?>">Produski</a></li>
							<!-- <li class="active"><a href="<?php echo site_url('Penggajian') ?>">Penggajian</a></li> -->
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="<?php echo site_url('Login/logout') ?>">Logout</a></li>
							<!-- <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li><a href="#">Separated link</a></li>
								</ul>
							</li> -->
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
			<nav class="navbar navbar-form" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- <a class="navbar-brand" href="#">Tahu Crispy</a> -->
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="<?php echo site_url('Admin') ?>">SDM</a></li>
							<li><a href="<?php echo site_url('Penggajian') ?>">Penggajian</a></li>
							<li><a href="<?php echo site_url('Lembur') ?>">Lembur</a></li>
							<li><a href="<?php echo site_url('Absensi') ?>"><b>Absensi</b></a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<!-- <li><a href="<?php echo site_url('Login/logout') ?>">Logout</a></li> -->
							<!-- <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li><a href="#">Separated link</a></li>
								</ul>
							</li> -->
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
			<div class="col-lg-12">
				<legend><center>Tambah Data Absensi</center></legend>
				<?php echo form_open('Absensi/create_datang'); ?>
				<?php echo validation_errors() ?>
				<p align="right">Tanggal : <?php echo date("d-m-Y") ?></p>
					<div class="form-group">
						<label for="">Nama Pegawai</label>
						<div class="checkbox">
						<?php foreach ($sdm as $key) { ?>
							<label>
									<input type="checkbox" name="fk_user[]" value="<?php echo $key->id_user ?>">
									<?php echo $key->nama ?>
							</label><br>
						<?php } ?>
						</div>
						<input type="hidden" name="hidden" id="inputHidden" class="form-control" value="hidden">
					</div>
				
					
				
					<button type="submit" class="btn btn-primary">Absen</button>
				<?php echo form_close(); ?>
			</div>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>