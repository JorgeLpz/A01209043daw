<?php  

	//Inicio o recuperdo la sesión
    session_start();

    //Traemos libreria de model
    require_once("model.php");

    include("partials/_header.html");
    include("partials/form_lugar.html");
    include("partials/_footer.html");

?>