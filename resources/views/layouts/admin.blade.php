<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Admin | Dashboard</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="/admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/admin/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="/admin/assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
	<link href="/admin/assets/css/animate.min.css" rel="stylesheet" />
	<link href="/admin/assets/css/style.min.css" rel="stylesheet" />
	<link href="/admin/assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="/admin/assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<link href="/admin/assets/css/datepicker.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="/admin/assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="/admin/assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
	
	<script src="/admin/assets/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
<style type="text/css">
	em { color: red !important;text-align: left!important;font-size: 17px !important; }
	.container-fluid{background-color:#fff;}

	.hidden{
		display:block !important;
	}
	.hidden svg{
		display:none;
	}
</style>
</head>
<body>
	<!-- begin #page-loader -->
	<!-- end #page-loader -->
	<!-- begin #page-container -->
	<div id="page-container" class="page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="dashboard.php" class="navbar-brand">
					<span style="font-size: 12px;">        
                    <b>CMS APP</b>
					</span></a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
                <!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<span class="user-image online">
								<img src="/admin/upload/241967.jpg" alt="" /> 
							</span>
							<span class="hidden-xs">
							<?php echo \Auth::user()->fullname?></span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="/admin/users/logout">Log Out</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
        </div>
        <div id="sidebar" class="sidebar">
	<!-- begin sidebar scrollbar -->
	<div data-scrollbar="true" data-height="100%">
		<!-- begin sidebar user -->
		<ul class="nav">
			<li class="nav-profile">
				<div class="image">
				<span class="user-image online"></span>
				</div>
				<div class="info">
				</div>
			</li>
		</ul>
		<!-- end sidebar user -->
		<!-- begin sidebar nav -->
		<ul class="nav">
			<li class="nav-header"></li>
			<li class="has-sub">
				<a href="/admin/users/dashboard"><span>Dashboard</span></a>
			</li>
			<li class="has-sub">
				<a href="/admin/pages/manage"><span>Manage Pages</span></a>
			</li>
			<br>
		</ul>
		<!-- end sidebar nav -->
	</div>
	<!-- end sidebar scrollbar -->
</div>
@yield('content')
<!-- ================== BEGIN BASE JS ================== -->
<script src="/admin/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
<script src="/admin/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
<script src="/admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="/admin/assets/js/bootstrap-datepicker.js"></script>
<script src="/admin/assets/js/somethingwrong.js"></script>
<script src="/js/jquery.validate.js" type="text/javascript"></script>
<script src="/js/custom.js" type="text/javascript"></script>