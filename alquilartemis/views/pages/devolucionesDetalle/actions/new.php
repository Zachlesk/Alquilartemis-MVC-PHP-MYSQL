<?php
if (isset($_POST['Enviar'])) {
    $url = "http://localhost/x/apirest/controllers/devolucionDetalles.php?op=insert";
    $data = array(
        'devolucionesId' => $_POST['devolucionesId'],
        'productoId' => $_POST['productoId'],
        'obraId' => $_POST['obraId'],
        'devolucionCantidad' => $_POST['devolucionCantidad'],
        'devolucionCantidadPropia' => $_POST['devolucionCantidadPropia'],
        'devolucionCantidadSubAlquilada' => $_POST['devolucionCantidadSubAlquilada'], 
        'estado' => $_POST['estado'],


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
  Registrar Devolucion Detalles
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
                <label for=""> Devolucion </label>
                <input type="text" name="devolucionesId">
            </div>
            <div>
                <label for=""> Producto </label>
                <input type="text" name="productoId">
            </div>
            <div>
                <label for=""> Obra </label>
                <input type="text" name="obraId">
            </div>
            <div>
                <label for="">Devolucion Cantidad</label>
                <input type="text" name="devolucionCantidad">
            </div>
            <div>
                <label for=""> Devolucion Cantidad Propia </label>
                <input type="text" name="devolucionCantidadPropia">
            </div>
            <div>
                <label for=""> Devolucion Cantidad SubAlquilada </label>
                <input type="text" name="devolucionCantidadSubAlquilada">
            </div>
                <label for=""> Estado </label>
                <input type="text" name="estado">
            </div>
            
            <input type="submit" value="Enviar" name="Enviar">
        </form>
      </div>
    </div>
  </div>
</div>