<?php
if (isset($_POST['Enviar'])) {
    $url = "http://localhost/x/apirest/controllers/inventario.php?op=insert";
    $data = array(
        'productoId' => $_POST['productoId'], 
        'cantidadInicial' => $_POST['cantidadInicial'],
        'cantidadIngresos' => $_POST['cantidadIngresos'],
        'cantidadSalidas' => $_POST['cantidadSalidas'],
        'cantidadFinal' => $_POST['cantidadFinal'],
        'fechaInventario' => $_POST['fechaInventario'],
        'tipoOperacion' => $_POST['tipoOperacion']
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec ($ch);
    curl_close($ch);
    print $response;

    /* echo "<script>alert('Datos guardados');document.location='inventario'</script>";  */
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Inventario
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
                <input type="text" name="productoId">
            </div>
            <div>
                <label for="">Cantidad Inicial</label>
                <input type="text" name="cantidadInicial">
            </div>
            <div>
                <label for="">Cantidad Ingresos</label>
                <input type="text" name="cantidadIngresos">
            </div>
            <div>
                <label for="">Cantidad Salidas</label>
                <input type="text" name="cantidadSalidas">
            </div>
            <div>
                <label for="">Cantidad Final</label>
                <input type="text" name="cantidadFinal">
            </div>
            <div>
                <label for="">Fecha Inventario</label>
                <input type="text" name="fechaInventario">
            </div>
            <div>
                <label for="">Tipo Operación</label>
                <input type="text" name="tipoOperacion">
            </div>
            <input type="submit" value="Enviar" name="Enviar">
        </form>
      </div>
    </div>
  </div>
</div>