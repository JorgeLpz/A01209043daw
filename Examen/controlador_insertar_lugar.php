<?php
	//Inicio o recuperdo la sesión
    session_start();

    //Traemos libreria de model
    require_once("model.php");

        if (isset($_POST["nombre"])) {
        
        $nombre = htmlspecialchars($_POST["nombre"]);

        AgregarNuevo($nombre);
        $_SESSION["mensaje"] = "Se completo el registro";
        }

    else {
            $_SESSION["warning"] = "Ocurrio un error al registar el producto";
        }
    

    header("location:index.php");

?>