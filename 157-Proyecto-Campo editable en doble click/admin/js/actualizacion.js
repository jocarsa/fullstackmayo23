console.log("Javascript funcionando...");
var elementos = document.getElementsByTagName("td");
console.log(elementos)
for(var i = 0;i<elementos.length;i++){
    console.log("voy a hacer algo con una celda")
    elementos[i].ondblclick = function(){
        console.log("has hecho doble click en una celda")
        this.setAttribute("contenteditable",true)
    }
    elementos[i].onblur = function(){
        console.log("te has salido de una celda")
        this.setAttribute("contenteditable",false)
    }
}