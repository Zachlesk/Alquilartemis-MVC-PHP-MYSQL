<?php
$url = "http://localhost/x/apirest/controllers/empleados.php?op=getAll";
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
                <h3 class="card-title">Empleados </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> ID </th>
                    <th>Nombre</th>
                    <th>Celular</th>
                    <th>Cargo</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        foreach($output as $out)
                        {                  
                    ?>
                  <tr>
                    <td><?php echo $out-> empleadoId; ?></td>
                    <td><?php echo $out-> nombreEmpleado; ?></td>
                    <td><?php echo $out-> celularEmpleado; ?></td>
                    <td><?php echo $out-> cargo; ?></td>
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