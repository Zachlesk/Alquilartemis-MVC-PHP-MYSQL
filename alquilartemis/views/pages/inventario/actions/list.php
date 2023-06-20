<?php
$url = "http://localhost/x/apirest/controllers/inventario.php?op=getAll";
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
                <h3 class="card-title">Inventario</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> ID </th>
                    <th>Producto</th>
                    <th>Cantidad Inicial</th>
                    <th>Cantidad Ingresos</th>
                    <th>Cantidad Salidas</th>
                    <th>Cantidad Final</th>
                    <th>Fecha inventario</th>
                    <th>Tipo operación</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        foreach($output as $out)
                        {                  
                    ?>
                  <tr>
                    <td><?php echo $out-> inventarioId; ?></td>
                    <td><?php echo $out-> productoId; ?></td>
                    <td><?php echo $out-> cantidadInicial; ?></td>
                    <td><?php echo $out-> cantidadIngresos; ?></td>
                    <td><?php echo $out-> cantidadSalidas; ?></td>
                    <td><?php echo $out-> cantidadFinal; ?></td>
                    <td><?php echo $out-> fechaInventario; ?></td>
                    <td><?php echo $out-> tipoOperacion; ?></td>
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