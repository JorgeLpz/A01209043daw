let articulo1 = 0;
let articulo2 = 0;
let articulo3 = 0;
let articulo4 = 0;
let articulo5 = 0;
let total = 0;

let comprar = function () {

    let input1 = Number(document.getElementById("cantidad1").value);

    let input2 = Number(document.getElementById("cantidad2").value);

    let input3 = Number(document.getElementById("cantidad3").value);

    let input4 = Number(document.getElementById("cantidad4").value);

    let input5 = Number(document.getElementById("cantidad5").value);


    if(input1 > 0){
        articulo1 = articulo1 + input1;
        document.getElementById("GOW5").innerHTML=articulo1;}
    if(input2 > 0){
        articulo2 = articulo2 + input2;
        document.getElementById("Destiny").innerHTML=articulo2;}

    if(input3 > 0){
        articulo3 = articulo3 + input3;
        document.getElementById("HaloReach").innerHTML=articulo3;}

    if(input4 > 0){
        articulo4 = articulo4 + input4;
        document.getElementById("Shrek2").innerHTML=articulo4;}

    if(input5 > 0){
        articulo5 = articulo5 + input5;
        document.getElementById("DragonBallZ").innerHTML=articulo5;

    }


    total = articulo1*1599 + articulo2*899 + articulo3*299 + articulo4*350 + articulo5*799;
    document.getElementById("Total").innerHTML=total+" $";

};

let Cancelar = function (){
        articulo1 = "";
        articulo2 = "";
        articulo3 = "";
        articulo4 = "";
        articulo5 = "";
        total = 0;

        document.getElementById("GOW5").innerHTML=articulo1;
        document.getElementById("Destiny").innerHTML=articulo2;
        document.getElementById("HaloReach").innerHTML=articulo3;
        document.getElementById("Shrek2").innerHTML=articulo4;
        document.getElementById("DragonBallZ").innerHTML=articulo5;
        document.getElementById("Total").innerHTML=total+" $";
}