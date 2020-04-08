<?php

	//Conexion con Base de Datos
	function conectar_bd() {
		$conexion_bd = mysqli_connect("localhost","root","","almacen");

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


	//Consulta de consultar Productos en Almacen
	function consultar_productos($marca="",$tipo="",$estatus=""){
		//Primero conectarse a la bd
		$conexion_bd = conectar_bd();

		$resultado = "<table><thead><tr><th>Nombre</th><th>Marca</th><th>Tipo de Producto</th><th>Unidades</th><th>Precio</th><th>Estatus</th><th>Acciones</th></tr></thead>";

		$consulta = 'SELECT pr.descripcion as pr_descripcion, m.nombre as m_nombre, pr.cantidad as pr_cantidad, pr.precio as pr_precio, tp.nombre as tp_nombre, e.nombre as e_nombre FROM producto as pr, productotiene as pt, marca as m, tipoproducto as tp, estatus as e WHERE pr.id_producto = pt.id_producto AND m.id_marca = pt.id_marca AND tp.id_tipo = pt.id_tipo AND e.id_estatus = pt.id_estatus';
		
		//Ahora con el buscador necesitamos un validador de que es lo que quiere buscar
		if ($marca != "") {
			$consulta .= " AND m.id_marca=".$marca;
		}

		if ($tipo != "") {
			$consulta .= " AND tp.id_tipo=".$tipo;
		}

		if ($estatus != "") {
			$consulta .= " AND e.id_estatus=".$estatus;
		}

		$resultados = $conexion_bd->query($consulta);  
		while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {
			//$resultado .= $row[0]; //Se puede usar el índice de la consulta
			$resultado .= "<tr>";
		    $resultado .= "<td>".$row['pr_descripcion']."</td>";
		    $resultado .= "<td>".$row['m_nombre']."</td>";
		    $resultado .= "<td>".$row['tp_nombre']."</td>";
		    $resultado .= "<td>".$row['pr_cantidad']."</td>";
		    $resultado .= "<td>$".$row['pr_precio']."</td>";
		    $resultado .= "<td>".$row['e_nombre']."</td>";
		    $resultado .= "<td><a class=\"waves-effect waves-light btn-small red lighten-2\"><i class=\"material-icons\">delete</i></a><a class=\"waves-effect waves-light btn-small\"><i class=\"material-icons\">edit</i></a><a class=\"waves-effect waves-light btn-small\" href=\"registrarIngresoProductos.php\"><i class=\"material-icons\">add_box</i></a><a class=\"waves-effect waves-light btn-small\"><i class=\"material-icons\">vpn_key</i></a></td>" ;
		    $resultado .= "</tr>";
		}
		mysqli_free_result($resultados); //Liberar la memoria

		// desconectarse al termino de la consulta
		desconectar_bd($conexion_bd);

		$resultado .= "</tbody></table>";

		return $resultado;
	}


//Consulta de consultar Productos en Almacen
	function consultar_top(){
		//Primero conectarse a la bd
		$conexion_bd = conectar_bd();

		$resultado = "<table><thead><tr><th>Nombre</th><th>Marca</th><th>Tipo de Producto</th><th>Unidades</th><th>Precio</th><th>Estatus</th><th>Acciones</th></tr></thead>";

		$consulta = 'SELECT `id_producto` FROM "producto" ORDER BY `id_producto` DESC LIMIT 1';
		

		$resultados = $conexion_bd->query($consulta);  
		while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {
			//$resultado .= $row[0]; //Se puede usar el índice de la consulta
			$resultado .= "<tr>";
		    $resultado .= "<td>".$row['pr_descripcion']."</td>";
		    $resultado .= "<td>".$row['m_nombre']."</td>";
		    $resultado .= "<td>".$row['tp_nombre']."</td>";
		    $resultado .= "<td>".$row['pr_cantidad']."</td>";
		    $resultado .= "<td>$".$row['pr_precio']."</td>";
		    $resultado .= "<td>".$row['e_nombre']."</td>";
		}
		mysqli_free_result($resultados); //Liberar la memoria

		// desconectarse al termino de la consulta
		desconectar_bd($conexion_bd);

		$resultado .= "</tbody></table>";

		return $resultado;
	}
	/*

	//Consulta de consultar Productos en Almacen
	function consultar_top($tabla){
		//Primero conectarse a la bd
		$conexion_bd = conectar_bd();

		$consulta = 'SELECT `id_producto` FROM '.$tabla.' ORDER BY `id_producto` DESC LIMIT 1';
		echo $consulta;
		
		$resultado = $conexion_bd->query($consulta); 
		echo $resultado; 
		
		// desconectarse al termino de la consulta
		desconectar_bd($conexion_bd);

		return $resultado;
	}

	var_dump(consultar_top("producto"));
	var_dump(consultar_productos("producto"));

*/





	//Crear un select con los datos de una consulta
	
	function consultar_select($id, $columna_descripcion, $tabla){
		//Primero conectarse a la bd
		$conexion_bd = conectar_bd();

		$resultado = '<select name ="'.$tabla.'"><option value="" disabled selected>Selecciona una opción</option>';

      	$consulta = "SELECT $id, $columna_descripcion FROM $tabla";
      	$resultados = $conexion_bd->query($consulta);
      	while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {
			$resultado .= '<option value="'.$row["$id"].'">'.$row["$columna_descripcion"].'</option>';
		}
      
      	// desconectarse al termino de la consulta
		desconectar_bd($conexion_bd);

		$resultado .= '</select><label>'.$tabla.'</label></div>';

		return $resultado;

	}


	// Funcion para insertar un registro de un producto en el almacen
	//Paso1: Preparar consulta
	//Paso2 Union de parametros
	//Paso3 Ejecutar la consulta
	function insertar_producto($descripcion, $cantidad, $precio){
		//Primero conectarse a la base de datos
		$conexion_bd = conectar_bd();

		//Prepaprar la consulta
		$dml = 'INSERT INTO producto (descripcion, cantidad, precio) VALUES (?,?,?) ';
		if ( !($statement = $conexion_bd->prepare($dml)) ){
			die("Error: (" . $conexion_bd->errno . ") " . $conexion_bd->error);
			return 0;
			}

		// Unir los parametros de la funcion con los parametros de la consulta
		// El primer argumento de bind_param es el formato de cada parametro
		if (!$statement->bind_param("sss", $descripcion, $cantidad, $precio)) {
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

	function insertar_productotiene($id_producto, $id_marca, $id_tipo){
		//Primero conectarse a la base de datos
		$conexion_bd = conectar_bd();

		//Prepaprar la consulta
		$dml = 'INSERT INTO productotiene (id_producto, id_marca, id_tipo, id_estatus) VALUES (?,?,?,?) ';
		if ( !($statement = $conexion_bd->prepare($dml)) ){
			die("Error: (" . $conexion_bd->errno . ") " . $conexion_bd->error);
			}

		// Unir los parametros de la funcion con los parametros de la consulta
		// El primer argumento de bind_param es el formato de cada parametro
		$id_estatus = 1; 
		if (!$statement->bind_param("ssss", $id_producto, $id_marca, $id_tipo, $id_estatus)) {
			die("Error en vinculación: (" . $statement->errno . ") " . $statement->error);
			}

		// Ejecutar la consulta
		if (!$statement->execute()) {
			die("Error en ejecución: (" . $statement->errno . ") " . $statement->error);
			}

		//Desconectarse de la base de datos
			  desconectar_bd($conexion_bd);
 
	}

?>