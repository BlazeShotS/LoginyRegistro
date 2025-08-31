<?php
session_start();
include('Conexion.php');

if(isset($_POST['Usuario']) && isset($_POST['Clave']) ){
    function validate($data){
        $data = trim($data);    //trim elimina espacios en blanco
        $data = stripslashes($data);    //Elimina barras invertidas
        $data = htmlspecialchars($data);    //Convierte caracteres especiales en entidades HTML 
        return $data;
    }

    $Usuario = validate($_POST['Usuario']);
    $Clave = validate($_POST['Clave']);

    if(empty($Usuario)){ //el empty evaluamos si esta vacio
        header("Location: Index.php?error=El usuario es requerido");
        exit();
    } elseif(empty($Clave)){
        header("Location: Index.php?error=La clave es requerida");
        exit(); 
    } else {
        // Consulta preparada
        $sql = "SELECT * FROM usuarios WHERE Usuario = ? AND Clave = ?"; //Busca en la base de datos un registro que coincida los valores
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $Usuario, $Clave);//va ss porque usuario y clave lo tomamos como string es decir caracter (varchar), si fuera usuario caracter y pass entero seria si
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) === 1){ //Verifica si exactamente UNA fila coincide con los criterior de la consulta
            $row = mysqli_fetch_assoc($result); //se espera obtener los datos del usuario que coincida con el criterio de busqueda
            if($row['Usuario'] === $Usuario && $row['Clave'] === $Clave){ //si son correctas o iguales las credenciales
                $_SESSION['Usuario'] = $row['Usuario'];
                $_SESSION['Nombre_Completo'] = $row['Nombre_Completo']; //VERIFICA SI LAS CREDENCIALES INGRESADAS POR EL USUARIO COINCIDE CON LO ALMACENADO EN LA BASE DE DATOS
                $_SESSION['Id'] = $row['Id'];
                header("Location: Inicio.php");
                exit();
            } else {
                header("Location: Index.php?error=El usuario o clave son incorrectos");
                exit();
            }
        } else {
            header("Location: Index.php?error=El usuario o clave son incorrectos");
            exit();
        }
    }
} else {
    header("Location: Index.php");
    exit();
}
?>