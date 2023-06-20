<?php
if (isset($_POST['Enviar'])) {
    $url = "http://localhost/x/apirest/controllers/alquiler.php?op=insert";
    $data = array(
        'clientesId' => $_POST['clientesId'], 
        'fechaAlquiler' => $_POST['fechaAlquiler'],
        'horaAlquiler' => $_POST['horaAlquiler'],
        'subtotalPeso' => $_POST['subtotalPeso'],
        'empleadoId' => $_POST['empleadoId'],
        'placaTransporte' => $_POST['placaTransporte'],
        'observaciones' => $_POST['observaciones']

    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec ($ch);
    curl_close($ch);
    print $response;
/* 
    echo "<script>alert('Datos guardados');document.location='alquiler'</script>";  */
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Alquiler
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
                <label for="">Cliente</label>
                <input type="text" name="clientesId">
            </div>
            <div>
                <label for="">Fecha Alquiler</label>
                <input type="date" name="fechaAlquiler">
            </div>
            <div>
                <label for="">Hora Alquiler</label>
                <input type="time" name="horaAlquiler">
            </div>
            <div>
                <label for="">Subtotal Peso</label>
                <input type="text" name="subtotalPeso">
            </div>
            <div>
                <label for=""> Empleado </label>
                <input type="text" name="empleadoId">
            </div>
            <div>
                <label for=""> Placa Transporte </label>
                <input type="text" name="placaTransporte">
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