<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.themeon.net/nifty/v2.2.3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2015 09:27:36 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PB Administrator</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ] -->
     <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url()?>assets/css/nifty.min.css" rel="stylesheet">

    <!--Chosen [ OPTIONAL ]-->
    <link href="<?php echo base_url()?>assets/plugins/chosen/chosen.min.css" rel="stylesheet">

    
    <!--Font Awesome [ OPTIONAL ]-->
    <link href="<?php echo base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!--Dropzone [ OPTIONAL ]-->
    <link href="<?php echo base_url()?>assets/plugins/dropzone/dropzone.css" rel="stylesheet">


    <link href="<?php echo base_url()?>assets/plugins/alightbox/ALightBox.css" rel="stylesheet">


    <!--Animate.css [ OPTIONAL ]-->
    <link href="<?php echo base_url()?>assets/plugins/animate-css/animate.min.css" rel="stylesheet">


    <!--Morris.js [ OPTIONAL ]-->
    <link href="<?php echo base_url()?>assets/plugins/morris-js/morris.min.css" rel="stylesheet">


    <!--Bootstrap Datepicker [ OPTIONAL ]-->
    <link href="<?php echo base_url()?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">



    <!--Switchery [ OPTIONAL ]-->
    <link href="<?php echo base_url()?>assets/plugins/switchery/switchery.min.css" rel="stylesheet">

    <!--Bootstrap Table [ OPTIONAL ]-->
    <link href="<?php echo base_url()?>assets/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet">


    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="<?php echo base_url()?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">


    <!--Demo script [ DEMONSTRATION ]-->
    <link href="<?php echo base_url()?>assets/css/demo/nifty-demo.min.css" rel="stylesheet">




    <!--SCRIPT-->
    <!--=================================================-->

    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <link href="<?php echo base_url()?>assets/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url()?>assets/plugins/pace/pace.min.js"></script>


    
	<!--

	REQUIRED
	You must include this in your project.

	RECOMMENDED
	This category must be included but you may modify which plugins or components which should be included in your project.

	OPTIONAL
	Optional plugins. You may choose whether to include it in your project or not.

	DEMONSTRATION
	This is to be removed, used for demonstration purposes only. This category must not be included in your project.

	SAMPLE
	Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


	Detailed information and more samples can be found in the document.

	-->
		

</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
	<div id="container" class="effect mainnav-lg">
		
		<!--NAVBAR-->
		<!--===================================================-->
		<header id="navbar">
			<div id="navbar-container" class="boxed">

				<!--Brand logo & name-->
				<!--================================-->
				<div class="navbar-header">
					<a href="<?php echo base_url()?>Dashboard" class="navbar-brand">
						<img src="<?php echo base_url()?>assets/img/logo.png" alt="Nifty Logo" class="brand-icon">
						<div class="brand-title">
							<span class="brand-text">PB Admin</span>
						</div>
					</a>
				</div>
				<!--================================-->
				<!--End brand logo & name-->


				<!--Navbar Dropdown-->
				<!--================================-->
				<div class="navbar-content clearfix">
					<ul class="nav navbar-top-links pull-left">

						<!--Navigation toogle button-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li class="tgl-menu-btn">
							<a class="mainnav-toggle" href="#">
								<i class="fa fa-navicon fa-lg"></i>
							</a>
						</li>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End Navigation toogle button-->


						<!--Messages Dropdown-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End message dropdown-->




						<!--Notification dropdown-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End notifications dropdown-->

					</ul>
					<ul class="nav navbar-top-links pull-right">

						<!--User dropdown-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li id="dropdown-user" class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
								<span class="pull-right">
									<img class="img-circle img-user media-object" src="<?php echo base_url()?>assets/img/av1.png" alt="Profile Picture">
								</span>
								<div class="username hidden-xs">Hello, <?php echo $this->session->userdata('nama')?></div>
							</a>


							<div class="dropdown-menu dropdown-menu-md dropdown-menu-right with-arrow panel-default">

								<!-- Dropdown heading  -->
								
								<!-- User dropdown menu -->
								<ul class="head-list">
									<!-- <li>
										<a href="#">
											<i class="fa fa-user fa-fw fa-lg"></i> Profile
										</a>
									</li> -->
									<li>
										<a href="<?php echo base_url()?>User/setting">
											<!-- <span class="label label-success pull-right">New</span> -->
											<i class="fa fa-gear fa-fw fa-lg"></i> Settings
										</a>
									</li>
								</ul>

								<!-- Dropdown footer -->
								<div class="pad-all text-right">
									<a href="<?php echo base_url()?>Login/keluar" class="btn btn-primary">
										<i class="fa fa-sign-out fa-fw"></i> Logout
									</a>
								</div>
							</div>
						</li>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End user dropdown-->

					</ul>
				</div>
				<!--================================-->
				<!--End Navbar Dropdown-->

			</div>
		</header>
		<!--===================================================-->
		<!--END NAVBAR-->

		<div class="boxed">
			
			<!--MAIN NAVIGATION-->
			<!--===================================================-->
			<nav id="mainnav-container">
				<div id="mainnav">

					<!--Shortcut buttons-->
					<!--================================-->
					<div id="mainnav-shortcut">
						<!-- <ul class="list-unstyled">
							<li class="col-xs-4" data-content="Additional Sidebar">
								<a id="demo-toggle-aside" class="shortcut-grid" href="#">
									<i class="fa fa-magic"></i>
								</a>
							</li>
							<li class="col-xs-4" data-content="Notification">
								<a id="demo-alert" class="shortcut-grid" href="#">
									<i class="fa fa-bullhorn"></i>
								</a>
							</li>
							<li class="col-xs-4" data-content="Page Alerts">
								<a id="demo-page-alert" class="shortcut-grid" href="#">
									<i class="fa fa-bell"></i>
								</a>
							</li>
						</ul> -->
					</div>
					<!--================================-->
					<!--End shortcut buttons-->


					<!--Menu-->
					<!--================================-->
					<div id="mainnav-menu-wrap">
						<div class="nano">
							<div class="nano-content">
								<ul id="mainnav-menu" class="list-group">
								<?php 
								$level = $this->session->userdata('level');
								if($level == 2) {								
								?>
									<!--Category name-->
									<li class="list-header">Menu Sidebar</li>
						
									<!--Menu list item-->
									<li class="active-link">
										<a href="<?php echo base_url()?>Dashboard">
											<i class="fa fa-dashboard"></i>
											<span class="menu-title">
												<strong>Dashboard</strong>
												<!-- <span class="label label-success pull-right">Top</span> -->
											</span>
										</a>
									</li>
						
									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="fa fa-th"></i>
											<span class="menu-title">
												<strong>Master Data</strong>
											</span>
											<i class="arrow"></i>
										</a>
						
										<!--Submenu-->
										<ul class="collapse">
											<li>
												<a href="<?php echo base_url()?>Master_data/kategori">Master Kategori</a>
											</li>
											<li>
												<a href="<?php echo base_url()?>Master_data/transportasi">Master Transportasi</a>
											</li>											
										</ul>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-tasks"></i>
											<span class="menu-title">
												<strong>Manajemen Data</strong>
											</span>
											<i class="arrow"></i>
										</a>
						
										<!--Submenu-->
										
										<ul class="collapse">
											<li>
												<a href="<?php echo base_url()?>Manajemen_data/wisata">Manajemen Wisata</a>
											</li>											
										</ul>
										<ul class="collapse">
											<li>
												<a href="<?php echo base_url()?>Manajemen_data/warung_makan">Manajemen Kuliner</a>
											</li>											
										</ul>
									</li>
									<?php } else { ?>
									<!--Category name-->
									<li class="list-header">Menu Sidebar</li>
						
									<!--Menu list item-->
									<li class="active-link">
										<a href="<?php echo base_url()?>Dashboard">
											<i class="fa fa-dashboard"></i>
											<span class="menu-title">
												<strong>Dashboard</strong>
												<!-- <span class="label label-success pull-right">Top</span> -->
											</span>
										</a>
									</li>
						
									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="fa fa-th"></i>
											<span class="menu-title">
												<strong>Master Data</strong>
											</span>
											<i class="arrow"></i>
										</a>
						
										<!--Submenu-->
										<ul class="collapse">
											<li>
												<a href="<?php echo base_url()?>Master_data/kategori">Master Kategori</a>
											</li>
											<li>
												<a href="<?php echo base_url()?>Master_data/transportasi">Master Transportasi</a>
											</li>											
										</ul>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-tasks"></i>
											<span class="menu-title">
												<strong>Manajemen Data</strong>
											</span>
											<i class="arrow"></i>
										</a>
						
										<!--Submenu-->
										<!-- <ul class="collapse">
											<li>
												<a href="<?php echo base_url()?>Manajemen_data/hotel">Manajemen Hotel</a>
											</li>											
										</ul> -->
										<ul class="collapse">
											<li>
												<a href="<?php echo base_url()?>Manajemen_data/wisata">Manajemen Wisata</a>
											</li>											
										</ul>
										<ul class="collapse">
											<li>
												<a href="<?php echo base_url()?>Manajemen_data/warung_makan">Manajemen Kuliner</a>
											</li>											
										</ul>
									</li>
									<li>
										<a href="index.html">
											<i class="fa fa-user"></i>
											<span class="menu-title">
												<strong>User</strong>
											</span>
											<i class="arrow"></i>
										</a>
										<!--Submenu-->
										<ul class="collapse">
											<li>
												<a href="<?php echo base_url()?>User/admin">Admin</a>
											</li>											
										</ul>
										<ul class="collapse">
											<li>
												<a href="<?php echo base_url()?>User/client">Client</a>
											</li>											
										</ul>
									</li>
									<?php } ?>
								</ul>

						
								<!--================================-->
								<!--End widget-->

							</div>
						</div>
					</div>
					<!--================================-->
					<!--End menu-->

				</div>
			</nav>
			<!--===================================================-->
			<!--END MAIN NAVIGATION-->
			

		</div>

		


				
				