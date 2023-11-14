<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from boletos");
    $boleto = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            
            <div class="card">
                <div class="card-header">
                    Lista de boletos
                </div>
                <div class="p-2 table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Número boleto</th>
                                <th scope="col">ID avión</th>
                                <th scope="col">ID usuario</th>
                                <th class="col">Número asiento</th>
                                <th class="col">Tipo asiento</th>
                                <th class="col">Lugar salida</th>
                                <th class="col">Destino</th>
                                <th class="col">Hora salida</th>
                                <th class="col">Fecha salida</th>
                                <th class="col">Precio</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($boleto as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->id_boleto; ?></td>
                                <td><?php echo $dato->num_boleto; ?></td>
                                <td><?php echo $dato->id_avion; ?></td>
                                <td><?php echo $dato->id_usuario; ?></td>
                                <td><?php echo $dato->num_asiento; ?></td>
                                <td><?php echo $dato->tipo_asiento; ?></td>
                                <td><?php echo $dato->lugar_salida; ?></td>
                                <td><?php echo $dato->destino; ?></td>
                                <td><?php echo $dato->hora_salida; ?></td>
                                <td><?php echo $dato->fecha_salida; ?></td>
                                <td>$<?php echo $dato->precio; ?></td>
                                <td><a class="text-success" href="editar.php?id_boleto=<?php echo $dato->id_boleto; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?id_boleto=<?php echo $dato->id_boleto; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                <div class="mb-3">
                        <label class="form-label">Número de boleto: </label>
                        <input type="text" class="form-control" name="txtnum_boleto" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID avión: </label>
                        <input type="text" class="form-control" name="txtid_avion" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID Usuario: </label>
                        <input type="text" class="form-control" name="txtid_usuario" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Número de asiento: </label>
                        <input type="number" class="form-control" name="txtnum_asiento" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de asiento: </label>
                        <input type="text" class="form-control" name="txttipo_asiento" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lugar de salida: </label>
                        <input type="text" class="form-control" name="txtlugar_salida" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Destino: </label>
                        <input type="text" class="form-control" name="txtdestino" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hora de salida: </label>
                        <input type="time" class="form-control" name="txthora_salida" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de salida: </label>
                        <input type="date" class="form-control" name="txtfecha_salida" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="text" class="form-control" name="txtprecio" required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
                <br><br><br>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>