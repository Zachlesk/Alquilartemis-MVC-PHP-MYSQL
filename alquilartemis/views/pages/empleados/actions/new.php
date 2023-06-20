<?php
if (isset($_POST['Enviar'])) {
    $url = "http://localhost/x/apirest/controllers/empleados.php?op=insert";
    $data = array(
        'nombreEmpleado' => $_POST['nombreEmpleado'], 
        'celularEmpleado' => $_POST['celularEmpleado'],
        'cargo' => $_POST['cargo']
  
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec ($ch);
    curl_close($ch);
    print $response;

    echo "<script>alert('Datos guardados');document.location='empleados'</script>"; 
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Empleado
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
                <label for="">Nombre Empleado</label>
                <input type="text" name="nombreEmpleado">
            </div>
            <div>
                <label for="">Celular Empleado</label>
                <input type="text" name="celularEmpleado">
            </div>
            <div>
                <label for="">Cargo</label>
                <input type="text" name="cargo">
            </div>
            <input type="submit" value="Enviar" name="Enviar">
        </form>
      </div>
    </div>
  </div>
</div>