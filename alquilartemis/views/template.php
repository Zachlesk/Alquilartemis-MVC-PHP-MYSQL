<?php
/*ruta api*/

$routesArray = explode("/", $_SERVER['REQUEST_URI']);
$routesArray = array_filter($routesArray);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ALQUILARTEMIS!</title>

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="views/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/assets/plugins/adminlte/css/adminlte.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <!-- DataTables -->
  <link rel="stylesheet" href="views/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="views/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="views/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- jQuery -->
  <script src="views/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="views/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="views/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="views/assets/plugins/adminlte/js/adminlte.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="views/assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="views/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="views/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="views/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="views/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="views/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="views/assets/plugins/jszip/jszip.min.js"></script>
  <script src="views/assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="views/assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="views/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="views/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="views/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php
    include("views/modules/navbar.php");
    ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="./views/assets/img/logo.png" alt="imagen" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AlquilaArtemis</span>
    </a>

    <!-- Sidebar -->
  <?php
    include ("views/modules/sidebar.php");
  ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

<?php
    if(!empty($routesArray[3])){

      if($routesArray[3] == "empleados" ||
         $routesArray[3] == "constructoraClientes"  ||
         $routesArray[3] == "productos" ||
         $routesArray[3] == "detallesCotizacion" ||
         $routesArray[3] == "facturacion" ||
         $routesArray[3] == "obras" ||
         $routesArray[3] == "alquiler" ||
         $routesArray[3] == "alquilerDetalle" ||
         $routesArray[3] == "devoluciones" ||
         $routesArray[3] == "devolucionesDetalle" ||
         $routesArray[3] == "inventario" ||
         $routesArray[3] == "liquidacion"){
         
         include "views/pages/".$routesArray[3]."/".$routesArray[3].".php";
         }else{
          include "views/pages/home/home.php";
         }
        }
        
?>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
             
              <div class="col-12 product-image-thumbs">

              </div>
            </div>
           
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php
    include("views/modules/footer.php");
 ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>
