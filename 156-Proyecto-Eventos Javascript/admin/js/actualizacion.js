console.log("Javascript funcionando...");
var elementos = document.getElementsByTagName("td");
console.log(elementos)
for(var i = 0;i<elementos.length;i++){
    console.log("voy a hacer algo con una celda")
    elementos[i].ondblclick = function(){
        console.log("has hecho doble click en una celda")
    }
}