<?php
    //print_r($_POST);
    if(empty($_POST["txtnum_boleto"]) || empty($_POST["txtid_avion"]) || empty($_POST["txtid_usuario"]) || empty($_POST["txtnum_asiento"]) || empty($_POST["txttipo_asiento"]) || empty($_POST["txtlugar_salida"]) || empty($_POST["txtdestino"]) || empty($_POST["txthora_salida"]) || empty($_POST["txtfecha_salida"]) || empty($_POST["txtprecio"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
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
    
    $sentencia = $bd->prepare("INSERT INTO `boletos`(`num_boleto`, `id_avion`, `id_usuario`, `num_asiento`, `tipo_asiento`, `lugar_salida`, `destino`, `hora_salida`, `fecha_salida`, `precio`) VALUES (?,?,?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$num_boleto, $id_avion, $id_usuario, $num_asiento, $tipo_asiento, $lugar_salida, $destino, $hora_salida, $fecha_salida, $precio]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>