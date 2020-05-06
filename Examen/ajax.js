//	Funcion para crear el objeto para realizar una peticion asincrona
function getRequestObject() {
  // Asynchronous objec created, handles browser DOM differences
  if(window.XMLHttpRequest) {
    // Mozilla, Opera, Safari, Chrome IE 7+
    return (new XMLHttpRequest());
  }
  else if (window.ActiveXObject) {
    // IE 6-
    return (new ActiveXObject("Microsoft.XMLHTTP"));
  } else {
    // Non AJAX browsers
    return(null);
  }
}


function buscar(){
	//console.log("click en buscar");
   request=getRequestObject();
   if(request!=null)
   {
   	 let incidente = document.getElementById("incidente").value;
     var url='controlador_buscar_incidente.php?incidente='+ incidente ;
     request.open('GET',url,true);

     request.onreadystatechange =
        	function() {
            	if((request.readyState==4)){
                	// Se recibió la respuesta asíncrona, entonces hay que actualizar el cliente.
					// A esta parte comúnmente se le conoce como la función del callback
                 	//console.log("respuesta recibida");
                 	document.getElementById("resultados_consulta_incidente").innerHTML = request.responseText;
                 } 	
        	};
     // Limpiar la petición
     request.send(null);
  }
}


function lugar(){
  //console.log("click en buscar");
   request=getRequestObject();
   if(request!=null)
   {
     let lugar = document.getElementById("lugar").value;
     var url='controlador_buscar_lugar.php?lugar='+ lugar ;
     request.open('GET',url,true);

     request.onreadystatechange =
          function() {
              if((request.readyState==4)){
                  // Se recibió la respuesta asíncrona, entonces hay que actualizar el cliente.
          // A esta parte comúnmente se le conoce como la función del callback
                  //console.log("respuesta recibida");
                  document.getElementById("resultados_consulta_lugar").innerHTML = request.responseText;
                 }  
          };
     // Limpiar la petición
     request.send(null);
  }
}

//Evento que detonara la peticion asincrona
document.getElementById("buscarlugar").onclick = lugar;
//Evento que detonara la peticion asincrona
document.getElementById("buscar").onclick = buscar;