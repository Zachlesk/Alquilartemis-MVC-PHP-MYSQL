<?php
$url = "http://localhost/x/apirest/controllers/alquiler.php?op=getAll";
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
                <h3 class="card-title">Alquiler </h3>
              </div>
              <div class="card-header  d-flex justify-content-end">
                <h3 class="card-title"> <a href="/x/alquilartemis/alquilerDetalle"> Ver detalles de alquiler </a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> ID </th>
                    <th> Cliente </th>
                    <th> Fecha Alquiler </th>
                    <th> Hora Alquiler </th>
                    <th> Subtotal Peso </th>
                    <th> Empleado </th>
                    <th> Placa Transporte </th>
                    <th> Observaciones </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        foreach($output as $out)
                        {                  
                    ?>
                  <tr>
                    <td><?php echo $out-> alquilerId; ?></td>
                    <td><?php echo $out-> clientesId; ?></td>
                    <td><?php echo $out-> fechaAlquiler; ?></td>
                    <td><?php echo $out-> horaAlquiler; ?></td>
                    <td><?php echo $out-> subtotalPeso; ?></td>
                    <td><?php echo $out-> empleadoId; ?></td>
                    <td><?php echo $out-> placaTransporte; ?></td>
                    <td><?php echo $out-> observaciones; ?></td>
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