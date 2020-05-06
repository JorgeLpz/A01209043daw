<?php
	session_start();
	require_once("model.php");
	$incidente = htmlspecialchars($_GET["incidente"]);

 	echo consultarBusquedaIncidente($incidente);

?>