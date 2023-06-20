<?php
$url = "http://localhost/x/apirest/controllers/detallesCotizacion.php?op=getAll";
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
                <h3 class="card-title"> Cotización </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> ID </th>
                    <th>Cliente</th>
                    <th>Producto </th>
                    <th> Fecha </th>
                    <th> Hora</th>
                    <th> Duración </th>
                    <th> Precio x dia de Alquiler </th>
                    <th> Total </th>

                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        foreach($output as $out)
                        {                  
                    ?>
                  <tr>
                    <td><?php echo $out-> detalleId; ?></td>
                    <td><?php echo $out-> cliente; ?></td>
                    <td><?php echo $out-> productosAlquilados; ?></td>
                    <td><?php echo $out-> fechaAlquilado; ?></td>
                    <td><?php echo $out-> horaAlquiler; ?></td>
                    <td><?php echo $out-> duracionAlquiler; ?></td>
                    <td><?php echo $out-> precioDiaAlquiler; ?></td>
                    <td><?php echo $out-> totalCotizacion; ?></td>
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