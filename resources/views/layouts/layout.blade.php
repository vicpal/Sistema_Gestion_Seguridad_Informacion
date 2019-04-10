<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ config('app.name', 'SGSI') }}</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="/css/skins/_all-skins.min.css">

  	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
	<!-- ================================================ -->

  	<header class="main-header">
		<!-- Logo -->
		<a href="http://localhost:8000/dominios" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>SG</b>SI</span>
			<!-- logo for regular state and mobile devices -->
			<span class="navbar-brand"><b>SGSI</b> Calidad</span>
		</a>
    	<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
							{{ Auth::user()->name }}
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
								<p>{{ Auth::user('id')->name }} - Web Developer <small>Member since Nov. 2018</small></p>
								<li class="user-footer">
									<div class="pull-right">
										<a class="btn btn-default btn-flat" href="{{ route('logout') }}"
											onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
											{{ __('Salir') }}
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
									</form>
									</div>
              	</li>
							</li>
						<!-- Menu Footer-->
					</ul>
				</li>
				<!-- Control Sidebar Toggle Button -->
				</ul>
			</div>
		</nav>
  	</header>

	<!-- =============================================== -->

	<!-- Left side column. contains the sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
			<img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
			<p>{{ Auth::user()->name }}</p>
			<!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
			<input type="text" name="q" class="form-control" placeholder="Search...">
			<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MENÚ DE NAVIGACIÓN</li>
			<li class="treeview">
			<a href="#">
				<i class="fa fa-tachometer"></i> <span>Panel de Administración</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="http://localhost:8000/sgsi/listado"><i class="fa fa-circle-o"></i> Listar Dominios</a></li>
				<li><a href="http://localhost:8000/dominios/create"><i class="fa fa-circle-o"></i> Crear Dominios</a></li>
			</ul>
			</li>
						
			<li class="treeview">
			<a href="#">
				<i class="fa fa-laptop"></i>
				<span>Submenú 2</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> Opcion 1</a></li>
				<li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Opcion 2</a></li>
				<li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Opcion 3</a></li>
			</ul>
			</li>
		</ul>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- =============================================== -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Sistema de Gestión de la Seguridad de la Información <br>
				<!-- <small>Inicia Aqui</small> -->
			</h1>
			<!-- MAPA DE SITIO -->
			<ol class="breadcrumb">
				<li><a href="http://localhost:8000/dominios"><i class="fa fa-dashboard"></i> Inicio</a></li>
				<!-- <li><a href="#">Paso 1</a></li> -->
				<li class="active">Usted Esta Aqui</li>
			</ol>
			<!-- FIN MAPA -->
		</section>

		<!-- Main content -->
		<section class="content">
			<!-- Default box
			<div class="box"> -->
				@yield('content')
				<!-- /.box-body -->
				
				<!-- /.box-footer
			</div> -->
			<!-- /.box -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- =============================================== -->

	<footer class="main-footer">
		<div class="pull-right hidden-xs">
		<b>Version</b> 1.0
		</div>
		<strong>Copyright &copy; 2018-2019 <a href="http://localhost:8000/dominios"> ViPCorp - SGSI</a>.</strong> All rights
		reserved.
	</footer>

	<!-- =============================================== -->

</div>
<!-- ./FIN wrapper -->

<!-- jQuery 3 -->
<script src="/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
