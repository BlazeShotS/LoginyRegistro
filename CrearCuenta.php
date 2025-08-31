<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqy12QvZ6jIW3" crossorigin="anonymous"> <!--BOSSTRAP--> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> <!--iCONOS-->
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="RegistrarUsuario.php" method="POST">
        <h1>Registrar Usuario</h1>
        <hr>
        <?php
            if(isset($_GET['error'])){
                echo '<p class="error">' . htmlspecialchars($_GET['error']) . '</p>';   //Mensaje de error
            }
            if(isset($_GET['success'])){
                echo '<p class="success">' . htmlspecialchars($_GET['success']) . '</p>';   //Mensaje de exito
            }
        ?>
        <hr>
        <i class="fa-solid fa-user"></i>
        <label>Usuario</label>
        <input type="text" name="Usuario" placeholder="Nombre de usuario" required>
        <i class="fa-solid fa-unlock"></i>
        <label>Clave</label>
        <input type="password" name="Clave" placeholder="Clave" required>
        <i class="fa-solid fa-user"></i>
        <label>Nombre Completo</label>
        <input type="text" name="Nombre_Completo" placeholder="Nombre Completo" required>
        <button class="boton" type="submit">Registrar</button>
        <a href="index.php" class="btn Iniciar-btn">Iniciar Sesión</a>
    </form>
</body>
</html>