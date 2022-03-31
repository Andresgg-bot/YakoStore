<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-
    scale=1.0">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
    </style>
    <link rel="stylesheet" href="css/loginRegister.css">
</head>

<body>
    
    <form action ="index.php" class="form-box">
        <h1>
            <img class="imagen" src="image/Logo.png"  alt="Profile Photo" >
        </h1>
        <h5 class="advice">
            Rellene los espacios para iniciar sesión.
        </h5>
        <input type="email" placeholder="Correo">
        <input type = "password" placeholder="Contraseña">
        <button type="submit">
            Login
        </button>
        <h5 class="registro">
            ¿No esta registrado? <a href="register.php">Crea una cuenta aquí</a>
        </h5>
        <h5 class="registro">
            Volver a la pagina  <a href="index.php">principal</a>
        </h5>
    </form>
</body>
</html>