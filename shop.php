<?php 
    require_once('connections/connection.php');

    $query = 'BEGIN SHOW_ALL_PRODUCTS(:productos); END;';
    $stmt = oci_parse($conn, $query);
    $productos = oci_new_cursor($conn);
    oci_bind_by_name($stmt,":productos",$productos,-1,OCI_B_CURSOR);

    oci_execute($stmt);
    oci_execute($productos, OCI_DEFAULT);

    // //insertar productos a carrito
    // $query = 'BEGIN INSERT_PRODUCT_INTO_CAR(:PRODUCTO_A_COMPRAR, ); END;';
    // $stmt = oci_parse($conn, $query);
    // $productos = oci_new_cursor($conn);
    // oci_bind_by_name($stmt,":productos",$productos,-1,OCI_B_CURSOR);

    // oci_execute($stmt);
    // oci_execute($productos, OCI_DEFAULT);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yako Tienda de mascotas</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styletable.css">

    
</head>
<body>
    
    <!-- header section starts  -->
    
    <header class="header">
        
        <a href="home.php" class="logo"> <i class="fas fa-paw"></i> Yako </a>
    
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="home.php">About</a>
            <a href="shop.php">Shop</a>
            <a href="home.php">Contact</a>
        </nav>
    
        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <a href="carrito.php" class="fas fa-shopping-cart"></a>
            <a href="login.php" class="fas fa-user"></a>
        </div>
    </header>

    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

    <!--Section shop starts-->

    <section>
            <table>
            <tr>
                <th>Nombre</th>
                <th>Descripción del producto</th>
                <th>Precio</th>
                <th>&nbsp;</th>

            </tr>
            <tr>
            
           <?php 
            while  ($row = oci_fetch_array ($productos, OCI_ASSOC+OCI_RETURN_NULLS)) {
            foreach ($row as $item) {
                print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'<br/>'.'</td>';
            }
            print '<td >'.'<button class="btnCompra" type="submit" onclick="openPopup()">Comprar</button>'.
            '<div class="popup" id="popup">
                <img src="image/404-tick.png" alt=""/>
                <h2>Thank You!</h2>
                <p>Your purchase has been successfully submitted</p>
                <button type="button" onclick="closePopup()">Close</button>
            </div>'.'<br/>'.'</td>';
            print '</tr>';
            }
             ?>
           </table>
    </section>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

    <!--Section footer starts-->

    <section class="footer">
    
    <img src="image/top_wave.png">

        <div class="share">
            <a href="https://www.facebook.com/YAKOTIENDADEMASCOTAS" class="btn"> <i class="fab fa-facebook-f"></i> Facebook </a>
            <a href="https://www.instagram.com/yakotiendademascotas/?hl=es-la" class="btn"> <i class="fab fa-instagram"></i> Instagram </a>
        </div>
    
        <div class="credit"> Created by <span> Grupo #1 </span> | All rights reserved! </div>
    
    </section>
    <script src="js/script.js"></script>
    <script src="js/popUp.js"></script>