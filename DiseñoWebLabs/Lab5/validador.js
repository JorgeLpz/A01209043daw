
function valida(f){
	let puntos = 1;
	let letras = "ABCDEFGHIJKLMNOPQRSTUVWYZ";


    if(f.elements["password"].value==f.elements["password2"].value){
    	puntos = puntos+1;
    	if(f.elements["password"].value == letras){
    		puntos = puntos +1;
    		if(puntos == 3){
    			alert("Contraseña de seguridad Buena");
    		}
    		else{
    			alert("Contraseña de seguridad Media");
    		}
    	}
    	else{
    		alert("Contraseña de seguridad Baja");
    	}
    	   		
    }
    else{
    	alert("Las contraseñas son distintas");
    }
}
