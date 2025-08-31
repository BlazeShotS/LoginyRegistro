<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqy12QvZ6jIW3" crossorigin="anonymous"> <!--BOOSTRAP-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> <!--iCONOS-->
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="IniciarSesion.php" method="POST"> <!--El action indica que los datos del formulario se enviaran  a IniciarSesion.php y el POST envia los datos para ser procesados o evaluados-->
        <h1>Iniciar Sesion</h1>
        <hr>
        <?php
            if(isset($_GET['error'])){
                echo '<p class="error">' . htmlspecialchars($_GET['error']) . '</p>'; //Mensaje de error nomas ya que si es exito te dirige a otra pagina
            }
        ?>
        <hr>
        <i class="fa-solid fa-user"></i>
        <label>Usuario</label>
        <input type="text" name="Usuario" placeholder="Nombre de usuario">
        <i class="fa-solid fa-unlock"></i>
        <label>Clave</label>
        <input type="password" name="Clave" placeholder="Clave">
        <button class="boton" type="submit">Iniciar Sesion</button> <!--al presionar el boton automaticamente me direcciona a IniciarSesion.php porque en la parte de;  form action="IniciarSesion.php" method="POST al poner eso programo a mi boton a donde se direcciona-->
        <a href="CrearCuenta.php" class="btn Registrar-btn">Registrarse</a>
    </form>
</body>
</html>