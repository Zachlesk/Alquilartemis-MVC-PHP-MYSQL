<?php
if (isset($_POST['Enviar'])) {
    $url = "http://localhost/x/apirest/controllers/liquidacion.php?op=insert";
    $data = array(
        'clienteId' => $_POST['clienteId'], 
        'alquilerId' => $_POST['alquilerId'],
        'valorQuincenalTotal' => $_POST['valorQuincenalTotal'],
        'valorMesTotal' => $_POST['valorMesTotal'],
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec ($ch);
    curl_close($ch);
    print $response;

   /*  echo "<script>alert('Datos guardados');document.location='liquidacion'</script>";  */
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Liquidación
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
                <input type="text" name="clienteId">
            </div>
            <div>
                <label for="">Alquiler</label>
                <input type="text" name="alquilerId">
            </div>
            <div>
                <label for="">Valor Quincenal</label>
                <input type="text" name="valorQuincenalTotal">
            </div>
            <div>
                <label for="">Valor Mes Total</label>
                <input type="text" name="valorMesTotal">
            </div>
            <input type="submit" value="Enviar" name="Enviar">
        </form>
      </div>
    </div>
  </div>
</div>