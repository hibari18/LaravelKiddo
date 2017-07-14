<!DOCTYPE html>

<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kiddo Academy SIS</title>
    <link rel="icon" type="image/gif" href="{{ asset('images/School Logo/symbol.png') }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrapcss/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminLTEcss/AdminLTE.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('css/datatables/dataTables.bootstrap.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap3-wysihtml5.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/adminLTEcss/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/formwizard2.css') }}">
  
  </head>

  <body class="hold-transition skin-green-light sidebar-mini">
    <div class="wrapper">

     @include('layouts.header')

      <!-- Left side column. contains the logo and sidebar -->
      @include('layouts.admin-sidebar')


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <div class="container">
        
          @yield('content')

        </div>
      </div>
      <!-- /.content-wrapper -->

      @include('layouts.footer')

      @include('layouts.sidebar')

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('js/jQuery/jquery-2.2.3.min.js') }}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('js/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('js/fastclick/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/distjs/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('js/distjs/demo.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('js/bootstrap3-wysihtml5.all.min.js') }}"></script>
  <!-- DataTables -->
    <script>
      $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
      $(".choose").select2();
      });
    </script>
    <script src="{{ asset('js/selectjs/select2.full.min.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('js/one.js') }}"></script> -->
  </body>
</html>
