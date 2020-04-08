<?php
	//Inicio o recuperdo la sesión
    session_start();

    //Traemos libreria de model
    require_once("model.php");

    $_POST["descripcion"] = htmlspecialchars($_POST["descripcion"]);
    //var_dump($_POST["descripcion"]);
    $_POST["cantidad"] = htmlspecialchars($_POST["cantidad"]);
    $_POST["precio"] = htmlspecialchars($_POST["precio"]);
    $_POST["estatus"] = htmlspecialchars($_POST["estatus"]);
    $_POST["marca"] = htmlspecialchars($_POST["marca"]);

    if (isset($_POST["descripcion"]) && isset($_POST["cantidad"]) && isset($_POST["precio"])) {
    	if(insertar_producto($_POST["descripcion"], $_POST["cantidad"],  $_POST["precio"])){
    		$_SESSION["mensaje"] = "Se registro un nuevo producto";
    	} else {
    		$_SESSION["warning"] = "Ocurrio un error al registar el producto";
    	}
    }

/*
    if (isset(var)) {
    	# code...
    }
*/
    header("location:productos.php");

?>