<?php
    require_once('connections/connection.php');

    $message = '';

    if(!empty($_POST['NOMBRE']) && !empty($_POST['PRIMER_APELLIDO']) && !empty($_POST['SEGUNDO_APELLIDO'])
    && !empty($_POST['CORREO']) && !empty($_POST['TELEFONO']) && !empty($_POST['CONTRASENA'])){
        $query = 'begin AUTH_USUARIOS.REGISTRAR_USUARIO (:NOMBRE, :PRIMER_APELLIDO, :SEGUNDO_APELLIDO, :CORREO, :TELEFONO, :CONTRASENA); end;';

        $stmt = oci_parse($conn, $query);
        oci_bind_by_name($stmt, ':NOMBRE', $_POST['NOMBRE']);
        oci_bind_by_name($stmt, ':PRIMER_APELLIDO', $_POST['PRIMER_APELLIDO']);
        oci_bind_by_name($stmt, ':SEGUNDO_APELLIDO', $_POST['SEGUNDO_APELLIDO']);
        oci_bind_by_name($stmt, ':CORREO', $_POST['CORREO']);
        oci_bind_by_name($stmt, ':TELEFONO', $_POST['TELEFONO']);
        /*$password = password_hash($_POST['CONTRASENA'], PASSWORD_BCRYPT);
        oci_bind_by_name($stmt, ':CONTRASENA', $password);*/
        oci_bind_by_name($stmt, ':CONTRASENA', $_POST['CONTRASENA']);
        
        if(!oci_execute($stmt)){
            $message = 'Error al crear un usuario, faltan datos';
        }else{
            $message = 'Usuario creado exitosamente';
            header("Location: index.php");
        }
    }
    oci_close($conn);
    
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-
    scale=1.0">
    <title>Create an account</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
    </style>
    <link rel="stylesheet" href="css/loginRegister.css">
</head>

<body>
    
    <form action ="register.php" class="form-box" method="post">
        <h1 class = "advice">Register</h1>
        <h5 class="advice">
            Please, fill the required spaces to create a new account.
        </h5>

        <input type="text" placeholder="Name" name="NOMBRE">
        <input type="text" placeholder="Last Name" name="PRIMER_APELLIDO">
        <input type="text" placeholder="Second Last Name" name="SEGUNDO_APELLIDO">
        <input type="email" placeholder="Email" name="CORREO">
        <input type="text" placeholder="Phone" name="TELEFONO">
        <input type = "password" placeholder="Password" name="CONTRASENA">

        <button type="submit">
            Register
        </button>

        <h5 class="registro">
            <a href="index.php">Go back to Login</a>
        </h5>

        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>
        
    </form>
</body>
</html>