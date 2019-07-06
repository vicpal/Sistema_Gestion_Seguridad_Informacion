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
	<!-- DATATABLES -->
	<link rel="stylesheet" href="/css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
	<!-- FIN DATATABLES -->
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
		<a href="http://127.0.0.1:8000/sgsi" class="logo">
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
							<img src="/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
							{{ Auth::user()->name }}
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
			<img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
			<p>{{ Auth::user()->name }}</p>
			<!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
			</div>
		</div>
		<!-- search form -->
		<form action=" " method="get" class="sidebar-form">
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
				<li><a href="{{ route('dominios.index') }}"><i class="fa fa-circle-o"></i> Dominios</a></li>
				<li><a href="{{ route('objcontrol.index') }}"><i class="fa fa-circle-o"></i> Obj. de Control</a></li>
				<li><a href="{{ route('control.index') }}"><i class="fa fa-circle-o"></i> Control</a></li>
			</ul>
			</li>
						
			<li class="treeview">
			<a href="#">
				<i class="fa fa-laptop"></i>
				<span>Reportes</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="{{ route('preguntas.index') }}"><i class="fa fa-circle-o"></i> Preguntas</a></li>
				<li><a href="{{ route('respuestas.index') }}"><i class="fa fa-circle-o"></i> Encuestas</a></li>
			</ul>
			</li>

			<li class="treeview">
			<a href="#">
				<i class="fa fa-user-o"></i>
				<span>Usuarios</span>
				<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="{{ route('usuario.index') }}"><i class="fa fa-circle-o"></i> Listar Usuarios</a></li>
			</ul>
			</li>
		</ul>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- =============================================== -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">

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
		<b>Version</b> 2.0
		</div>
		<strong>Copyright &copy; 2018-2019 <a href="{{ route('dominios.index') }}"> ViPCorp - SGSI</a>.</strong> All rights
		reserved.
	</footer>

	<!-- =============================================== -->

</div>
<!-- ./FIN wrapper -->

<!-- jQuery 3 -->
<script src="/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/js/demo.js"></script>
<script src="/js2/axios.min.js"></script>
<script src="/js2/vue.min.js"></script>
<script src="/js2/scripts.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<!-- ----------------------------------- ADICIONALES -------------------------------------- -->
<!-- CREAR Y BORRAR CAMPOS DINAMICOS -->
<script type="text/javascript">
	$(document).ready(function() {
		var MaxInputs       = 5; //maximum input boxes allowed
		var contenedor   	= $("#contenedor"); //Input boxes wrapper ID
		var AddButton       = $("#agregarCampo"); //Add button ID
		//var x = contenedor.length; //initlal text box count
		var X = $("#contenedor div").length + 1;
		var FieldCount = X-1; //to keep track of text box added
		$(AddButton).click(function (e)  //on add input button click
		{
			if(X <= MaxInputs) //max input box allowed
			{
				FieldCount++; //text box added increment
				//add input box
				$(contenedor).append('<div class="added"><input type="text" name="nombre_preg[]" id="nombre_preg'+ FieldCount +'"  class="form-control" placeholder="Pregunta '+ FieldCount +'"/><a href="#" class="eliminar"><span class="glyphicon glyphicon-remove"></a></div>');
				X++; //text box increment
			}
		return false;
		});
		$("body").on("click",".eliminar", function(e){ //user click on remove text
				if( X > 1 ) {
						$(this).parent('div').remove(); //remove text box
						X--; //decrement textbox
				}
		return false;
		});
	});
</script>
<!-- FIN CAMPOS DINAMICOS -->
<!-- Datatables -->
<script>
  	$(function () {
		$('#example1').DataTable()
		$('#example2').DataTable({
			'paging'      : true,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : false
    	})
  	})
</script>
<!-- Fin Datatables -->
</body>
</html>
