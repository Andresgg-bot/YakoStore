<?php
require_once('connections/connection.php');

$query = 'BEGIN SHOW_INFO_CART(:CARRITO_PRODUCTOS); END;';
$stmt = oci_parse($conn, $query);
//cursor
$CARRITO_PRODUCTOS = oci_new_cursor($conn);
oci_bind_by_name($stmt, ":CARRITO_PRODUCTOS", $CARRITO_PRODUCTOS, -1, OCI_B_CURSOR);

oci_execute($stmt);
oci_execute($CARRITO_PRODUCTOS, OCI_DEFAULT);
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
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="index.php" class="fas fa-user"></a>
        </div>
    </header>

        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />

    <section>
        <table>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
            <tr>

                <?php
                while ($row = oci_fetch_array($CARRITO_PRODUCTOS, OCI_ASSOC + OCI_RETURN_NULLS)) {
                    foreach ($row as $item) {
                        print '<td>'. ($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp') . '<br/>' . '</td>';
                    }
                    print '</tr>';
                }
                ?>
        </table>

        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />

            <button type="submit" class="btnCompra">
                <a href="OrdenDetalle.php">Orden Detalle</a>
            </button>
        </div>
    </section>

    <br />
    <br />
    <br />
    <br />
    <br />
    <br /> 
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />

    <section class="footer">

        <img src="image/top_wave.png" alt="">

        <div class="share">
            <a href="https://www.facebook.com/YAKOTIENDADEMASCOTAS" class="btn"> <i class="fab fa-facebook-f"></i> Facebook </a>
            <a href="https://www.instagram.com/yakotiendademascotas/?hl=es-la" class="btn"> <i class="fab fa-instagram"></i> Instagram </a>
        </div>

        <div class="credit"> Created by <span> Grupo #1 </span> | All rights reserved! </div>

    </section>
    <script src="js/script.js"></script>
</body>

</html>