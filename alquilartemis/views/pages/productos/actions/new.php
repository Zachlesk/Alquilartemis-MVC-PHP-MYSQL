<?php
if (isset($_POST['Enviar'])) {
    $url = "http://localhost/x/apirest/controllers/productos.php?op=insert";
    $data = array(
        'nombreProducto' => $_POST['nombreProducto'], 
        'tipoProducto' => $_POST['tipoProducto'],
        'descripcionProducto' => $_POST['descripcionProducto'],
        'precioUnitario' => $_POST['precioUnitario'],
        'stock' => $_POST['stock']
  
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec ($ch);
    curl_close($ch);
    print $response;

    echo "<script>alert('Datos guardados');document.location='productos'</script>";  
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Producto
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
                <label for="">Nombre Producto</label>
                <input type="text" name="nombreProducto">
            </div>
            <div>
                <label for="">Tipo Producto</label>
                <input type="text" name="tipoProducto">
            </div>
            <div>
                <label for="">Descripcion de Producto</label>
                <input type="text" name="descripcionProducto">
            </div>
            <div>
                <label for="">Precio Unitario</label>
                <input type="text" name="precioUnitario">
            </div>
            <div>
                <label for=""> Stock </label>
                <input type="text" name="stock">
            </div>
            <input type="submit" value="Enviar" name="Enviar">
        </form>
      </div>
    </div>
  </div>
</div>