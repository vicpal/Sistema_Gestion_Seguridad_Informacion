
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE | Inicio</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/admin/css/ionicons.min.css">
  <link rel="stylesheet" href="/admin/css/jquery-jvectormap.css">
  <link rel="stylesheet" href="/admin/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/admin/css/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- Aqui iba el Header VIP-->
    @include('admin.menues.navbtop')
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      @include('admin.menues.menulateral')
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @include('admin.menues.barrahorizontal')
      <!-- Contenido del Layout -->
      <section class="content"></section>
    </div>
    <!-- /.content-wrapper -->
    <!-- Aqui va el footer -->
    @include('admin.menues.footer')
    <!-- fin footer -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="/admin/js/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="/admin/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="/admin/js/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="/admin/js/adminlte.min.js"></script>
  <!-- Sparkline -->
  <script src="/admin/js/jquery.sparkline.min.js"></script>
  <!-- jvectormap  -->
  <script src="/admin/js/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="/admin/js/jquery-jvectormap-world-mill-en.js"></script>
  <!-- SlimScroll -->
  <script src="/admin/js/jquery.slimscroll.min.js"></script>
  <!-- ChartJS -->
  <script src="/admin/js/Chart.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="/admin/js/dashboard2.js"></script>
  <!-- AdminLTE for demo purposes 
  <script src="/admin/js/demo.js"></script> -->
</body>
</html>