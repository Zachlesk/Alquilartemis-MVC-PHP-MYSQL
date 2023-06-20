<?php
$url = "http://localhost/x/apirest/controllers/devolucionDetalles.php?op=getAll";
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
                <h3 class="card-title">Devoluciones Detalles </h3>
              </div>
              <div class="card-header  d-flex justify-content-end">
                <h3 class="card-title"> <a href="/x/alquilartemis/devoluciones"> Volver a el encabezado de devoluciones </a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> ID </th>
                    <th> Devolucion </th>
                    <th> Producto </th>
                    <th> Obra </th>
                    <th> Devolucion Cantidad </th>
                    <th> Devolucion Cantidad Propia </th>
                    <th> Devolucion Cantidad Subalquilada </th>
                    <th> Estado </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        foreach($output as $out)
                        {                  
                    ?>
                  <tr>
                    <td><?php echo $out-> devolucionesDetalleId; ?></td>
                    <td><?php echo $out-> devolucionesId; ?></td>
                    <td><?php echo $out-> productoId; ?></td>
                    <td><?php echo $out-> obraId; ?></td>
                    <td><?php echo $out-> devolucionCantidad; ?></td>
                    <td><?php echo $out-> devolucionCantidadPropia; ?></td>
                    <td><?php echo $out-> devolucionCantidadSubAlquilada; ?></td>
                    <td><?php echo $out-> estado; ?></td>
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