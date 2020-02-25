/* 
############################

Laboratorio 4 JS
Jorge Andrés López Chávez 
A01209043

############################

*/
// Ejercicio 1
function cubo() {
	//Recibimos un numero por medio de un prompt y asignamos a numero
	let numero = prompt("Cuantos Numeros Deseas Calcular su Cubo y Cuadrado:");

	//Condicion si el numero es mayor a 1, si es menor no hara nada.
	if (numero >= 1) {
		//Generamos los encabezados de la tabla
		document.write("<tr>");
		document.write("<th>Numero</th> <th>Cuadrado</th> <th>Cubo</th>");
		document.write("</tr>");
		document.write("<table>")

		//Generamos un ciclo que vaya asignando valores a la tabla
		for (var i = 1; i <= numero; i++) {
			document.write("<tr>");
			document.write("<td>"+i+"</td> "+" <td>"+i*i+" </td>"+"<td> "+i*i*i+"</td>");
			document.write("</tr>");
		}
		document.write("</table>")
	}
}

// Ejercicio 2
function suma() {
	/*creamos variables de numeros aleatorios
		-	Rango [1 - 10]
		- 	Math.floor: devulve el valor de abajo en caso de tener numero decimal
		-	Math.random: sirve para obtner un numero random*/
	//Variable que tenga la solucion
	let tiempo1 = new Date();
	let alnum = Math.floor(Math.random()*10);
	let alenum = Math.floor(Math.random()*10);
	let numero = prompt("Cual es el Resultado de 2 numeros aleatorios de un rango de [1 - 10] : "+alnum+" + "+alenum);
	let tiempo2 = new Date();
	let sec = tiempo2 - tiempo1;
	let diff = Math.floor(sec / 1000);
	let seg = diff % 60;

	for (var i = 8; i >= 0; i--) {
		if (numero == alenum+alnum) {
			alert("Felicidades has adivinado el numero"+seg);
			i = 0;
		}
		else{
		numero = prompt("Fallaste, Intenta de Nuevo, 2 numeros aleatorios de un rango de [1 - 10] : "+alnum+" + "+alenum+" "+seg);
		alnum = Math.floor(Math.random()*10);
		alenum = Math.floor(Math.random()*10);
		}
	}
}


//Ejercicio 3

function contador() {
	//inicializamos variables necesarias para realizar conteo
	let arrNum = new Array();
	let contNeg = 0;
	let contPos = 0;
	let contCero = 0;

	//Creamos un ciclo para asignar valores random al Array
	for(let i = 0; i < 50; i++){
		//Asignamos valor al Array en pos [i], el array limito entre [1 - 10] y le resto 5 para obtner algunos negativos.
		arrNum[i]= Math.floor((Math.random()*10)-5);
		//imprimo en el html el arreglo
		document.write(arrNum[i]+" "+" ");

		//Condicion para sortear y contar cuantos hay de cada contador
		// contamos los valores que sean negativos
		if(arrNum[i] < 0){
				contNeg = contNeg + 1;
		}
		else if(arrNum[i] > 0){
				contPos = contPos + 1;
		} else{
				contCero = contCero + 1;
		}
	}
			//Ahora ponemos en el html los valores de los contadores
			document.write("<br>"+"<br>"+"<strong>Números Positivos: </strong>" +contPos);
			document.write("<br>"+"<strong>Números Negativos: </strong>" +contNeg);
			document.write("<br>"+"<strong>Numeros en Cero:</strong> " + contCero);
}


//Ejercicio 4

function promedio(){
	// Creamos una matriz donde se alojara un arreglo de numeros, ademas de una variable auxiliar para ir sumando
	let matriz = [];
	let arrNum = new Array(10);
	let aux = 0;

	//Ciclo que recorrera la matriz, necesitamos promedio de filas entonces ciclo anidado
	//5 filas y 10 columnas
	for (var i = 0; i < 5; i++) {
		matriz[i] = [];
		//creamos segundo ciclo que recorre la fila 
		for(var j = 0; j < 10; j++) {
			//Asignamos un valor aleatorio a la posicion [i] [j]
		    matriz[i][j] = Math.floor(Math.random()*10);
		    //Agregamos el nuevo valor de  [i] [j] a nuestro auxiliar
			//aux += matriz[i][j]
		    aux += matriz[i][j];
		    document.write(matriz[i][j]+" ");
		}
		//Agregar estetica a la matriz y separarlo de los resultados finales.
		document.write("<br>");
		//Asignamos en la celda arreglo el valor del promedio para desplegarlo despues (promedio aux/datosFila)
		arrNum[i] = aux/10;
	}

	//Creamos un ciclo para recorrer la matriz donde se guardo los valores de los promedios( 5, son las filas)
	for (var i = 0; i < 5; i++) {
		document.write("<br><strong>Fila "+i+"con promedio de: </strong>"+arrNum[i]+"<br>");
	}

}


//Ejercicio 5
function inversa() {
	//Pedimos por un numero
	let numero = prompt("Dame un numero para invertir: ");

	// verificamos que de un numero psotivo
	if (numero >= 0) {
		//Convertimos nuetsro nuemero a un string
		let numLetra = numero.toString();
		//Con el String hacemos transformaciones, separamos y juntamos.
		let numTrans = numLetra.split("").reverse().join("");
		//Con el texto ya transformado, lo convertimos a numero de nuevo.
		let numRev = Number(numTrans);	
		document.write("<h1>Funcion Inversa de un Numero</h1>");
		document.write("<br>Numero Escrito: "+numero);
   		document.write("<br>Numero Alreves: "+numRev);	
    }
}
