<?php 
    require_once('connections/connection.php');

    $query = 'BEGIN SHOW_ALL_PRODUCTS(:productos); END;';
    $stmt = oci_parse($conn, $query);
    $productos = oci_new_cursor($conn);
    oci_bind_by_name($stmt,":productos",$productos,-1,OCI_B_CURSOR);

    oci_execute($stmt);
    oci_execute($productos, OCI_DEFAULT);
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
    
</head>
<body>
    
    <!-- header section starts  -->
    
    <header class="header">
        
        <a href="#" class="logo"> <i class="fas fa-paw"></i> Yako </a>
    
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="index.php">About</a>
            <a href="shop.php">Shop</a>
            <a href="index.php">Contact</a>
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
            <table  style="border: 1px solid; width: 65%; font-size: 12px; text-align: center; margin-left: auto; margin-right: auto; border-collapse: collapse;">
            <tr>
                <th style="border: 1px solid;">Nombre</th>
                <th style="border: 1px solid;">Descripción del producto</th>
                <th style="border: 1px solid;">Precio</th>
            </tr>
            <tr>
            
           <?php 
            while  (($row = oci_fetch_array ($productos, OCI_BOTH)) != false) {
            foreach ($row as $item) {
                print '<td style="border: 1px solid; height: 70px; width: 13%">'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'<br/>'.'</td>';
            }
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
    
        <img src="image/top_wave.png" alt="">
    
        <div class="share">
            <a href="https://www.facebook.com/YAKOTIENDADEMASCOTAS" class="btn"> <i class="fab fa-facebook-f"></i> Facebook </a>
            <a href="https://www.instagram.com/yakotiendademascotas/?hl=es-la" class="btn"> <i class="fab fa-instagram"></i> Instagram </a>
        </div>
    
        <div class="credit"> Created by <span> Grupo #1 </span> | All rights reserved! </div>
    
    </section>
    <script src="js/script.js"></script>