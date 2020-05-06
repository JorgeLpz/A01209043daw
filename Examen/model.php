<?php  
	
	//Conexion con Base de Datos
	function conectar_bd() {
		$conexion_bd = mysqli_connect("mysql1008.mochahost.com","dawbdorg_1209043","1209043","dawbdorg_A01209043");
		//$conexion_bd = mysqli_connect("localhost","root","","jurassic");
		$conexion_bd->set_charset("utf8");
		//verificar si la base de datos se conecto
		if( $conexion_bd == NULL){
			die("No se pudo conectar con la base de datos");
		}
		return $conexion_bd;
	}

	//Cerrar conexion de Base de Datos
	//@param $conexion: Conexion que se cerrara
	function desconectar_bd($conexion_bd){
		mysqli_close($conexion_bd);
	}

	function obtenerHistorial($id){
    $conexion_bd=conectar_bd();
    $consulta='call ObtenerHistorial('.$id.')';
    $resultado="";
    $resultados=mysqli_query($conexion_bd,$consulta);
    if(mysqli_num_rows($resultados)>0){
      while($row=mysqli_fetch_assoc($resultados)){
        $resultado.=$row["E_nombre"];
        $resultado.=" (".$row["H_fecha"].")";
        $resultado.="<br>";
      }
    }
    mysqli_free_result($resultados);
    desconectar_bd($conexion_bd);
    return $resultado;
  }

  	function consultarTabla(){
    $conexion_bd=conectar_bd();
    $resultado='<table class="highlight"><thead><tr><th>Lugar</th><th>Incidente</th></tr></thead>';
    $consulta='call ObtenerLugar()';
    $resultados=mysqli_query($conexion_bd,$consulta);
    if(mysqli_num_rows($resultados)>0){
      while($row=mysqli_fetch_assoc($resultados)){
        $resultado.="<tr>";
        $resultado.="<td>".$row["Z_nombre"]."</td>";
        $resultado.="<td>";
        $resultado.= obtenerHistorial($row["Z_id"]);
        $resultado.= '<a href="controlador_agregar_incidente.php?id='.$row["Z_id"].'&nombre='.$row["Z_nombre"].'"class="waves-effect waves-light btn"><i class="material-icons left">add</i>Registrar Incidente</a>';
        $resultado.="</td>";
        $resultado.="</tr>";
      }
    }
    mysqli_free_result($resultados);
    desconectar_bd($conexion_bd);
    $resultado.="</tbody></table>";
    return $resultado;
  }


	function AgregarHistorial($id_lugar,$id_incidente){
		//Primero conectarse a la base de datos
		$conexion_bd = conectar_bd();

		//Prepaprar la consulta
		$dml = 'call AgregarHistorial ((?),(?));';

		if ( !($statement = $conexion_bd->prepare($dml)) ){
			die("Error: (" . $conexion_bd->errno . ") " . $conexion_bd->error);
			return 0;
			}

		if (!$statement->bind_param("ss", $id_lugar, $id_incidente)) {
			die("Error en vinculación: (" . $statement->errno . ") " . $statement->error);
			return 0;
			}

		// Ejecutar la consulta
		if (!$statement->execute()) {
			die("Error en ejecución: (" . $statement->errno . ") " . $statement->error);
			return 0;
			}

		//Desconectarse de la base de datos
			  desconectar_bd($conexion_bd);
			  return 1;
 
	}


	function consultar_select($id, $columna_descripcion, $tabla){
		//Primero conectarse a la bd
		$conexion_bd = conectar_bd();

		$resultado = '<select name ="'.$tabla.'" id ="'.$tabla.'"><option value="" disabled selected>Selecciona una opción</option>';

      	$consulta = "SELECT $id, $columna_descripcion FROM $tabla " ;
      	$resultados = $conexion_bd->query($consulta);
      	while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {
			$resultado .= '<option value="'.$row["$id"].'">'.$row["$columna_descripcion"].'</option>';
		}
      
      	// desconectarse al termino de la consulta
		desconectar_bd($conexion_bd);

		$resultado .= '</select><label>'.$tabla.'</label></div>';

		return $resultado;

	}

	
		function AgregarNuevo($lugar){
		//Primero conectarse a la base de datos
		$conexion_bd = conectar_bd();

		//Prepaprar la consulta
		$dml = 'call Agregarlugar((?));';

		if ( !($statement = $conexion_bd->prepare($dml)) ){
			die("Error: (" . $conexion_bd->errno . ") " . $conexion_bd->error);
			return 0;
			}

		if (!$statement->bind_param("s", $lugar)) {
			die("Error en vinculación: (" . $statement->errno . ") " . $statement->error);
			return 0;
			}

		// Ejecutar la consulta
		if (!$statement->execute()) {
			die("Error en ejecución: (" . $statement->errno . ") " . $statement->error);
			return 0;
			}

		//Desconectarse de la base de datos
			  desconectar_bd($conexion_bd);
			  return 1;
 
	}

	function consultarConsultas(){
    $conexion_bd=conectar_bd();
    $resultado='<table class="highlight"><thead><tr><th>lugar</th><th>Incidente</th><th>Incidente</th><th>Incidente</th></tr></thead>';
    $consulta='call Obtenerlugar()';
    $resultados=mysqli_query($conexion_bd,$consulta);
    if(mysqli_num_rows($resultados)>0){
      while($row=mysqli_fetch_assoc($resultados)){
        $resultado.="<tr>";
        $resultado.="<td>".$row["Z_nombre"]."</td>";
        $resultado.="<td>";
        $resultado.= obtenerHistorial($row["Z_id"]);
        $resultado.= '<a href="controlador_agregar_incidente.php?id='.$row["Z_id"].'&nombre='.$row["Z_nombre"].'"class="waves-effect waves-light btn"><i class="material-icons left">add</i>Registrar Incidente</a>';
        $resultado.="</td>";
        $resultado.="</tr>";
      }
    }
    mysqli_free_result($resultados);
    desconectar_bd($conexion_bd);
    $resultado.="</tbody></table>";
    return $resultado;
  }
	
  function consultarNumero(){
    $conexion_bd=conectar_bd();
    $resultado='';
    $consulta='call ContarLugares()';
    $resultados=mysqli_query($conexion_bd,$consulta);
    if(mysqli_num_rows($resultados)>0){
      while($row=mysqli_fetch_assoc($resultados)){
        $resultado.= $row["Contar"];
      }
    }
    mysqli_free_result($resultados);
    desconectar_bd($conexion_bd);
    return $resultado;
  }


	function obtenerNumeroEstatus($id){
    $conexion_bd=conectar_bd();
    $consulta='call ObtenerUltimoEstatus('.$id.')';
    $resultado="";
    $resultados=mysqli_query($conexion_bd,$consulta);
    if(mysqli_num_rows($resultados)>0){
      while($row=mysqli_fetch_assoc($resultados)){
        $resultado.=$row["Contar"];
      }
    }
    mysqli_free_result($resultados);
    desconectar_bd($conexion_bd);
    return $resultado;
  }


  function consultarIncidente(){
    $conexion_bd=conectar_bd();
    $resultado='<table class="highlight"><thead><tr><th>Incidente</th><th>Numero de Casos Actuales</th></tr></thead>';
    $consulta='call ObtenerEstatus()';
    $resultados=mysqli_query($conexion_bd,$consulta);
    if(mysqli_num_rows($resultados)>0){
      while($row=mysqli_fetch_assoc($resultados)){
        $resultado.="<tr>";
        $resultado.="<td>".$row["E_nombre"]."</td>";
        $resultado.="<td>";
        $resultado.= obtenerNumeroEstatus($row["E_id"]);
        $resultado.="</td>";
        $resultado.="</tr>";
      }
    }
    mysqli_free_result($resultados);
    desconectar_bd($conexion_bd);
    $resultado.="</tbody></table>";
    return $resultado;
  }


  	function consultarHistorialporFecha(){
    $conexion_bd=conectar_bd();
    $resultado='<table class="highlight"><thead><tr><th>Lugar</th><th>Incidente</th><th>Fecha de Registro</th></tr></thead>';
    $consulta='call ObtenerTodoHistorial()';
    $resultados=mysqli_query($conexion_bd,$consulta);
    if(mysqli_num_rows($resultados)>0){
      while($row=mysqli_fetch_assoc($resultados)){
        $resultado.="<tr>";
        $resultado.="<td>".$row["Z_nombre"]."</td>";
        $resultado.="<td>".$row["E_nombre"]."</td>";
        $resultado.="<td>".$row["H_fecha"]."</td>";
        $resultado.="</tr>";
      }
    }
    mysqli_free_result($resultados);
    desconectar_bd($conexion_bd);
    $resultado.="</tbody></table>";
    return $resultado;
  }


  function consultarBusquedaHistorial($id=""){
    $conexion_bd=conectar_bd();
    $resultado='<table class="highlight"><thead><tr><th>Lugar</th><th>Incidente</th><th>Fecha de Registro</th></tr></thead>';
    if ($id != "") {
      $consulta='call ObtenerTodoLugar('.$id.')';
    }else {
      $consulta='call ObtenerTodoHistorial()';
    }
    
    $resultados=mysqli_query($conexion_bd,$consulta);
    if(mysqli_num_rows($resultados)>0){
      while($row=mysqli_fetch_assoc($resultados)){
        $resultado.="<tr>";
        $resultado.="<td>".$row["Z_nombre"]."</td>";
        $resultado.="<td>".$row["E_nombre"]."</td>";
        $resultado.="<td>".$row["H_fecha"]."</td>";
        $resultado.="</tr>";
      }
    }
    mysqli_free_result($resultados);
    desconectar_bd($conexion_bd);
    $resultado.="</tbody></table>";
    return $resultado;
  }


  function consultarBusquedaIncidente($incidente){
  	$conexion_bd=conectar_bd();
    $resultado='<table class="highlight"><thead><tr><th>Lugar</th><th>Incidente</th><th>Fecha de Registro</th></tr></thead>';
  
    $consulta='call ObtenerBusquedaHistorial('.$incidente.')';
    
    $resultados=mysqli_query($conexion_bd,$consulta);
    if(mysqli_num_rows($resultados)>0){
      while($row=mysqli_fetch_assoc($resultados)){
        $resultado.="<tr>";
        $resultado.="<td>".$row["Z_nombre"]."</td>";
        $resultado.="<td>".$row["E_nombre"]."</td>";
        $resultado.="<td>".$row["H_fecha"]."</td>";
        $resultado.="</tr>";
      }
        $resultado.= '<br><h6>Total de Incidentes: ';
      	$resultado.= obtenerNumeroBusqueda($incidente);
      	$resultado.= '</h6>';
        }
    mysqli_free_result($resultados);
    desconectar_bd($conexion_bd);
    $resultado.="</tbody></table>";
    return $resultado;
  }
 

  function obtenerNumeroBusqueda($id){
    $conexion_bd=conectar_bd();
    $consulta='call ObtenerNumeroIncidente('.$id.')';
    $resultado="";
    $resultados=mysqli_query($conexion_bd,$consulta);
    if(mysqli_num_rows($resultados)>0){
      while($row=mysqli_fetch_assoc($resultados)){
        $resultado.=$row["Contar"];
      }
    }
    mysqli_free_result($resultados);
    desconectar_bd($conexion_bd);
    return $resultado;
  }
  

?>

