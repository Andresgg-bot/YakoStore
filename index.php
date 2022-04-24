<?php
    require_once('connections/connection.php');

    $message = '';

    if(!empty($_POST['CORREO']) && !empty($_POST['CONTRASENA'])){

        $Resultado = oci_new_cursor($conn);
        $query = 'begin LOGIN (:CORREO, :CONTRASENA, :RESULTADO); end;';

        $records = oci_parse($conn, $query);
        oci_bind_by_name($records, ':CORREO', $_POST['CORREO']);
        oci_bind_by_name($records, ':CONTRASENA', $_POST['CONTRASENA']);
        oci_bind_by_name($records, ':RESULTADO', $Resultado, -1, OCI_B_CURSOR);
        oci_execute($records);

        oci_execute($Resultado);
        if (($row = oci_fetch_array($Resultado, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            if(!oci_execute($records)){
                $message = 'Error al ingresar al sistema, el email o la contraseña no son validos';
            }else{
                /*var_dump(oci_execute($Resultado));
                die();*/
                $message = 'Usuario ingresado exitosamente';
                header("Location: home.php");
            } 
        }
    }
?>

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
    
    <form action ="index.php" class="form-box" method="post">
        <h1>
            <img class="imagen" src="image/Logo.png"  alt="Profile Photo" >
        </h1>
        <h5 class="advice">
            Rellene los espacios para iniciar sesión.
        </h5>
        <input type="email" placeholder="Correo" name="CORREO">
        <input type = "password" placeholder="Contraseña" name="CONTRASENA">
        <button type="submit">
            Login
        </button>
        <h5 class="registro">
            ¿No esta registrado? <a href="register.php">Crea una cuenta aquí</a>
        </h5>

        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

    </form>
</body>
</html>