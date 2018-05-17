<?php 
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'usbw');
define('DB_DATABASE', 'practica7');
define('DB_PORT', 3307);

date_default_timezone_set('America/Mexico_City');

// Metodo para obtener la conexion a la base de datos mediante PDO 
function getDBConnection()
{
	$host = DB_SERVER; 
	$dbname = DB_DATABASE;
	$port = DB_PORT;
	$connStr = "mysql:host={$host};dbname={$dbname};port={$port};";
	$opt = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
	return new PDO($connStr, DB_USER,DB_PASSWORD,$opt);
}

?>