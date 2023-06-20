<?php


if (isset($_POST['Enviar'])) {
    $url = "http://localhost/x/apirest/controllers/detallesCotizacion.php?op=insert";
    $data = array(
        'cliente' => $_POST['cliente'],  
        'productosAlquilados' => $_POST['productosAlquilados'],
        'fechaAlquilado' => $_POST['fechaAlquilado'],
        'horaAlquiler' => $_POST['horaAlquiler'],
        'duracionAlquiler' => $_POST['duracionAlquiler'],
        'precioDiaAlquiler' => $_POST['precioDiaAlquiler'],
        'totalCotizacion' => $_POST['totalCotizacion']
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec ($ch);
    curl_close($ch);
    print $response;

    echo "<script>alert('Datos guardados');document.location='detallesCotizacion'</script>"; 
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Cotizacion
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
                <input type="text" name="cliente">
            </div>
            <div>
                <label for="">Producto alquilado</label>
                <input type="text" name="productosAlquilados">
            </div>
            <div>
                <label for="">Fecha de Alquilación</label>
                <input type="date" name="fechaAlquilado">
            </div>
            <div>
                <label for="">Hora de Alquiler </label>
                <input type="time" name="horaAlquiler">
            </div>
            <div>
                <label for=""> Duración de Alquiler </label>
                <input type="text" name="duracionAlquiler">
            </div>
            <div>
                <label for=""> Precio por dia de alquiler </label>
                <input type="text" name="precioDiaAlquiler">
            </div>
            <div>
                <label for=""> Total de Cotización </label>
                <input type="text" name="totalCotizacion">
            </div>
            <input type="submit" value="Enviar" name="Enviar">
        </form>
      </div>
    </div>
  </div>
</div>