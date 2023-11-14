<?php 
    if(!isset($_GET['id_boleto'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $id_boleto = $_GET['id_boleto'];

    $sentencia = $bd->prepare("DELETE FROM boletos where id_boleto = ?;");
    $resultado = $sentencia->execute([$id_boleto]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>