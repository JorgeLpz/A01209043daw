<?php
	session_start();
	require_once("model.php");
	$lugar = htmlspecialchars($_GET["lugar"]);

 	echo consultarBusquedaHistorial($lugar);

?>