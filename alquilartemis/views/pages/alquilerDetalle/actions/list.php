<?php
$url = "http://localhost/x/apirest/controllers/alquilerDetalle.php?op=getAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl));
curl_close($curl);
?>


<?php
include "new.php";
?>

              <div class="card">
              <div class="card-header  d-flex justify-content-center">
                <h3 class="card-title">Alquiler Detalles </h3>
              </div>
              <div class="card-header  d-flex justify-content-end">
                <h3 class="card-title"> <a href="/x/alquilartemis/alquiler"> Volver a el encabezado de alquiler </a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> ID </th>
                    <th> Productos </th>
                    <th> Obra </th>
                    <th> Cantidad Alquiler </th>
                    <th> Cantidad Propia </th>
                    <th> Cantidad Sub Alquilada </th>
                    <th> Valor Unidad </th>
                    <th> Fecha StandBy </th>
                    <th> Estado </th>
                    <th> Valor Total </th>
                    <th> Empleado </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        foreach($output as $out)
                        {                  
                    ?>
                  <tr>
                    <td><?php echo $out-> alquilerDetalleId; ?></td>
                    <td><?php echo $out-> productosId; ?></td>
                    <td><?php echo $out-> obraId; ?></td>
                    <td><?php echo $out-> cantidadAlquiler; ?></td>
                    <td><?php echo $out-> cantidadPropia; ?></td>
                    <td><?php echo $out-> cantidadSubAlquilada; ?></td>
                    <td><?php echo $out-> valorUnidad; ?></td>
                    <td><?php echo $out-> fechaStandBy; ?></td>
                    <td><?php echo $out-> estado; ?></td>
                    <td><?php echo $out-> valorTotal; ?></td>
                    <td><?php echo $out-> empleadoId; ?></td>
                  </tr>
                  <?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>