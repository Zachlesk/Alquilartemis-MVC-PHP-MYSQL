<?php
if (isset($_POST['Enviar'])) {
    $url = "http://localhost/x/apirest/controllers/alquilerDetalle.php?op=insert";
    $data = array(
        'productosId' => $_POST['productosId'],
        'obraId' => $_POST['obraId'],
        'cantidadAlquiler' => $_POST['cantidadAlquiler'],
        'cantidadPropia' => $_POST['cantidadPropia'],
        'cantidadSubAlquilada' => $_POST['cantidadSubAlquilada'],
        'valorUnidad' => $_POST['valorUnidad'],
        'fechaStandBy' => $_POST['fechaStandBy'],
        'estado' => $_POST['estado'],
        'valorTotal' => $_POST['valorTotal'],
        'empleadoId' => $_POST['empleadoId'],

    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec ($ch);
    curl_close($ch);
    print $response;
 echo "<script>alert('Datos guardados');document.location='alquilerDetalle'</script>";   
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Alquiler Detalles
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
                <label for="">Producto</label>
                <input type="text" name="productosId">
            </div>
            <div>
                <label for="">Obra</label>
                <input type="text" name="obraId">
            </div>
            <div>
                <label for="">Cantidad Alquiler</label>
                <input type="text" name="cantidadAlquiler">
            </div>
            <div>
                <label for="">Cantidad Propia</label>
                <input type="text" name="cantidadPropia">
            </div>
            <div>
                <label for=""> Cantidad Sub Alquilada </label>
                <input type="text" name="cantidadSubAlquilada">
            </div>
            <div>
                <label for=""> Valor Unidad </label>
                <input type="text" name="valorUnidad">
            </div>
            <div>
                <label for=""> Fecha Standby </label>
                <input type="text" name="fechaStandBy">
            </div>
            <div>
                <label for=""> Estado </label>
                <input type="text" name="estado">
            </div>
            <div>
                <label for=""> Valor Total </label>
                <input type="text" name="valorTotal">
            </div>
            <div>
                <label for=""> Empleado </label>
                <input type="text" name="empleadoId">
            </div>
            <input type="submit" value="Enviar" name="Enviar">
        </form>
      </div>
    </div>
  </div>
</div>