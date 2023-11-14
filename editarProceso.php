<?php
    print_r($_POST);
    if(!isset($_POST['id_boleto'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $id_boleto = $_POST['id_boleto'];
    $num_boleto = $_POST['txtnum_boleto'];
    $id_avion = $_POST['txtid_avion'];
    $id_usuario = $_POST['txtid_usuario'];
    $num_asiento = $_POST['txtnum_asiento'];
    $tipo_asiento = $_POST['txttipo_asiento'];
    $lugar_salida = $_POST['txtlugar_salida'];
    $destino = $_POST['txtdestino'];
    $hora_salida = $_POST['txthora_salida'];
    $fecha_salida = $_POST['txtfecha_salida'];
    $precio = $_POST['txtprecio'];


    $sentencia = $bd->prepare("UPDATE boletos SET `num_boleto`=?,`id_avion`=?,`id_usuario`=?,`num_asiento`=?,`tipo_asiento`=?,`lugar_salida`=?,`destino`=?,`hora_salida`=?,`fecha_salida`=?,`precio`=? where id_boleto = ?;");
    $resultado = $sentencia->execute([$num_boleto, $id_avion, $id_usuario, $num_asiento, $tipo_asiento, $lugar_salida, $destino, $hora_salida, $fecha_salida, $precio, $id_boleto]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>