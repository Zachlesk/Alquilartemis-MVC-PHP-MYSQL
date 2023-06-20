<?php
if (isset($_POST['Enviar'])) {
    $url = "http://localhost/x/apirest/controllers/devolucion.php?op=insert";
    $data = array(
        'alquilerId' => $_POST['alquilerId'], 
        'empleadoId' => $_POST['empleadoId'],
        'clienteId' => $_POST['clienteId'],
        'fechaDevolucion' => $_POST['fechaDevolucion'],
        'horaDevolucion' => $_POST['horaDevolucion'],
        'observaciones' => $_POST['observaciones'],
  
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec ($ch);
    curl_close($ch);
    print $response;

    /* echo "<script>alert('Datos guardados');document.location='devoluciones'</script>";  */
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Devoluciones
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div>
                <label for="">Alquiler</label>
                <input type="text" name="alquilerId">
            </div>
            <div>
                <label for="">Empleado</label>
                <input type="text" name="empleadoId">
            </div>
            <div>
                <label for="">Cliente</label>
                <input type="text" name="clienteId">
            </div>
            <div>
                <label for="">Fecha Devolucion</label>
                <input type="text" name="fechaDevolucion">
            </div>
            <div>
                <label for="">Hora Devolucion</label>
                <input type="text" name="horaDevolucion">
            </div>
            <div>
                <label for=""> Observaciones </label>
                <input type="text" name="observaciones">
            </div>
            <input type="submit" value="Enviar" name="Enviar">
        </form>
      </div>
    </div>
  </div>
</div>