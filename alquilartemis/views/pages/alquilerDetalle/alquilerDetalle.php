<?php

if(isset($_POST["submit"])){
    require_once("crud.php");

$insert = new Empleados();

$insert -> set_nombre($_POST['nombre']);
$insert -> set_cel($_POST['celular']);

$insert -> insertEmpleado();

echo "<script>alert('funciona?');document.location='template.php';</script>";
}


?>
  
  <section class="content-header">  
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Users </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Alquiler  </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <?php
          include "actions/list.php";
        ?>
      </div>
    </section>
