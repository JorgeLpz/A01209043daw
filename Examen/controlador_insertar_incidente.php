<?php
	//Inicio o recuperdo la sesión
    session_start();

    //Traemos libreria de model
    require_once("model.php");
    

        if (isset($_POST["incidente"])) {
        //var_dump($_POST["descripcion"]);
        $id_estado = htmlspecialchars($_POST["incidente"]);
        $id_zombie = $_GET["id"];

        AgregarHistorial($id_zombie,$id_estado);
        $_SESSION["mensaje"] = "Se completo el registro";
        }

    else {
            $_SESSION["warning"] = "Ocurrio un error al registar el producto";
        }
    

    header("location:index.php");

?>