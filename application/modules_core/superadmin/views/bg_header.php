
<doctype html>
<html>
<head>
	<title><?php echo $_SESSION['site_title']; ?></title>
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/admin/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/admin/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/admin/css/style.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/main.js"></script>
	<link href="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/redactor/redactor.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/redactor/redactor.min.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript">
	$(document).ready( function()
		{	
				$('#alamat').redactor();
				$('#visi_misi').redactor();				
		});
	</script>
</head>
<body>
	<div class="navbar navbar-fixed-top m-header">
		<div class="navbar-inner m-inner">
		
			<div class="container-fluid">
				<a target="_blank" class="brand m-brand" href="<?php echo base_url(); ?>"><?php echo $_SESSION['site_title']; ?><h4><?php echo $_SESSION['site_tema']; ?></h4></a>
		        
				<div class="nav-collapse collapse">
	
					<div class="btn-group pull-right">
				        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			          		<i class="icon-user"></i> <?php echo $this->session->userdata("nama_user_login"); ?>
			          		<span class="caret"></span>
				        </a>
				        <ul class="dropdown-menu">
			          		<li><a href="<?php echo base_url(); ?>superadmin/profil"><i class="icon-map-marker"></i> Profil User</a></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/password"><i class="icon-folder-open"></i> Password User</a></li>
	 		 				<li class="divider"></li>
			          		<li><a href="<?php echo base_url(); ?>auth/user_login/logout"><i class="icon-off"></i> Logout</a></li>
				        </ul>
			      	</div>
	
					<div class="btn-group pull-right">
				        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			          		<i class="icon-cog"></i> Konfigurasi
			          		<span class="caret"></span>
				        </a>
				        <ul class="dropdown-menu">
			          		<li><a href="<?php echo base_url(); ?>superadmin/user"><i class="icon-leaf"></i> Manajemen User</a></li>
                            <li class="divider"></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/routing_pages"><i class="icon-refresh"></i> Routing Pages</a></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/sistem"><i class="icon-fire"></i> Sistem</a></li>
				        </ul>
			      	</div>
				
					<div class="btn-group pull-right">
							<a class="btn" href="<?php echo base_url(); ?>superadmin">
								<i class="icon-home"></i> Dashboard
							</a>
					</div>
	          	</div>
			</div>
		</div>
	</div>
	<div class="m-top"></div>
	<aside class="sidebar">
		<ul class="nav nav-tabs nav-stacked">

			<li class="<?php echo $aktif_pesan_musyda; ?>">
				<a href="<?php echo base_url(); ?>superadmin/pesan_musyda">
				<?php if($_SESSION['count_pesan_musyda']!=0){ ?>
					<span class="badge badge-important m-badge-notification"><?php echo $_SESSION['count_pesan_musyda']; ?></span>
				<?php } ?>
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-bukutamu.png">
						</div>
						<div class="title">
							PESAN UNTUK MUSYDA
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="">
				<a href="<?php echo base_url(); ?>superadmin/cabang">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/cabang.png" width="25">
						</div>
						<div class="title">
							DATA CABANG
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>


			<li class="">
				<a href="<?php echo base_url(); ?>superadmin/admin_panitia">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/panitia.png" height="20">
						</div>
						<div class="title">
							DATA PANITIA
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="">
				<a href="<?php echo base_url(); ?>superadmin/operator">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-operator.png" height="20">
						</div>
						<div class="title">
							OPERATOR
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

	    </ul>
	</aside>
	<div class="m-sidebar-collapsed">
		<ul class="nav nav-pills">
			
		</ul>

		<div class="arrow-border">
			<div class="arrow-inner"></div>
		</div>
	</div>