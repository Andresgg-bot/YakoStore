<?php

// Conectar al servicio XE (es deicr, la base de datos) en la máquina "localhost"
$conn = oci_connect('PROYECTO', '123', 'localhost/ORCL');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
?>