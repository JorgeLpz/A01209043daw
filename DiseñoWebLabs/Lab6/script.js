

function pedir_proyecto() {
	let div = document.getElementById("nombre_proyecto");

  div.innerHTML = "Numero Siniestro:  <input id=\"nombre\" value=\" \"> <button id=\"boton\">Registrar</button>";
	
	document.getElementById("boton").onclick = alerta_proyecto;
}

function alerta_proyecto() {
	let div = document.getElementById("container-alert");
	let proyecto = document.getElementById("nombre").value;

	div.innerHTML = "<div class=\"card bg-success text-white\"><div class=\"card-body\"><p>Nuevo Siniestro: "+proyecto+" </p></div></div>"

}

function agregar_producto() {
  let div = document.getElementById("consumible_nuevo");

  div.innerHTML = "Cantidad:  <input id=\"numero\" value=\" \"><br> Producto:  <input id=\"descripcion\" value=\" \"> <button id=\"boton\">Registrar</button>";

  document.getElementById("boton").onclick = alerta_consumible;
}

function alerta_consumible(){
  let div = document.getElementById("container-alert-consumible");
  let material = document.getElementById("descripcion").value;
  let cantidad = document.getElementById("numero").value;

  div.innerHTML = "<div class=\"card bg-warning text-white\"><div class=\"card-body\"><p>Se agregaron "+cantidad+" "+material+" en bodega. </p></div></div>"
}


function prestar_articulo() {
  let div = document.getElementById("registro_prestamo");

  div.innerHTML = "Cantidad:  <input id=\"numero\" value=\" \"><br> Producto:  <input id=\"descripcion\" value=\" \">Solicitante:  <input id=\"trabajador\" value=\" \">Autoriza:  <input id=\"almacenista\" value=\" \"> <button id=\"boton\">Registrar</button>";

  document.getElementById("boton").onclick = alerta_prestamo;
}

function alerta_prestamo(){
  let div = document.getElementById("container-alert-prestamo");
  let numero = document.getElementById("numero").value;
  let material = document.getElementById("descripcion").value;
  let trabajador = document.getElementById("trabajador").value;
  let empleado = document.getElementById("almacenista").value;
  
  div.innerHTML = "<div class=\"card bg-warning text-white\"><div class=\"card-body\"><p>Se agregaron "+numero+" "+material+" prestado a "+trabajador+" autorizado por "+empleado+" en bodega. </p></div></div>"
}


document.getElementById("prestamo").onclick = prestar_articulo;

document.getElementById("consumible").onclick = agregar_producto;

document.getElementById("proyecto").onclick = pedir_proyecto;


