<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['id_boleto'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $id_boleto = $_GET['id_boleto'];

    $sentencia = $bd->prepare("select * from boletos where id_boleto = ?;");
    $sentencia->execute([$id_boleto]);
    $boleto = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($boleto);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Número de boleto: </label>
                        <input type="text" class="form-control" name="txtnum_boleto" autofocus required
                        value="<?php echo $boleto->num_boleto; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID avión: </label>
                        <input type="text" class="form-control" name="txtid_avion" autofocus required
                        value="<?php echo $boleto->id_avion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID Usuario: </label>
                        <input type="text" class="form-control" name="txtid_usuario" required 
                        value="<?php echo $boleto->id_usuario; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Número de asiento: </label>
                        <input type="number" class="form-control" name="txtnum_asiento" required 
                        value="<?php echo $boleto->num_asiento; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de asiento: </label>
                        <input type="text" class="form-control" name="txttipo_asiento" required 
                        value="<?php echo $boleto->tipo_asiento; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lugar de salida: </label>
                        <input type="text" class="form-control" name="txtlugar_salida" required 
                        value="<?php echo $boleto->lugar_salida; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Destino: </label>
                        <input type="text" class="form-control" name="txtdestino" required 
                        value="<?php echo $boleto->destino; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hora de salida: </label>
                        <input type="time" class="form-control" name="txthora_salida" required 
                        value="<?php echo $boleto->hora_salida; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de salida: </label>
                        <input type="date" class="form-control" name="txtfecha_salida" required 
                        value="<?php echo $boleto->fecha_salida; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="text" class="form-control" name="txtprecio" required 
                        value="<?php echo $boleto->precio; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id_boleto" value="<?php echo $boleto->id_boleto; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
                <br><br><br><br>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>