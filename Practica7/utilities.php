<?php
// Archivo con las utilidades de la base de datos
include_once 'db/db_utilities.php';
//Arrays que guardaran los productos, usuarios y ventas de la base de datos.
$productos = getProductos(); // Obtenemos los productos
$ventas = getVentas(); // Obtenemos los ventas
$usuarios = getUsuarios(); // Obtenemos los usuarios
$concentrados = getConcentrado(); // Obtenemos el concentrado del sistema

?>
