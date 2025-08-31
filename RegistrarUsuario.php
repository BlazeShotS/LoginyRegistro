<?php
session_start();
include('Conexion.php');

if(isset($_POST['Usuario']) && isset($_POST['Clave']) && isset($_POST['Nombre_Completo'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Usuario = validate($_POST['Usuario']);
    $Clave = validate($_POST['Clave']);
    $Nombre_Completo = validate($_POST['Nombre_Completo']);

    if(empty($Usuario)){
        header("Location: CrearCuenta.php?error=El usuario es requerido");
        exit();
    } elseif(empty($Clave)){
        header("Location: CrearCuenta.php?error=La clave es requerida");
        exit(); 
    } elseif(empty($Nombre_Completo)){
        header("Location: CrearCuenta.php?error=El nombre completo es requerido");
        exit(); 
    } else {
        // Consulta preparada para insertar el usuario a la base de datos
        $sql = "INSERT INTO usuarios (Usuario, Clave, Nombre_Completo) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, 'sss', $Usuario, $Clave, $Nombre_Completo);
        $result = mysqli_stmt_execute($stmt);

        if($result){
            header("Location: CrearCuenta.php?success=Tu cuenta ha sido creada exitosamente");
            exit();
        } else {
            header("Location: CrearCuenta.php?error=Error al crear la cuenta");
            exit();
        }
    }
} else {
    header("Location: CrearCuenta.php");
    exit();
}
?>