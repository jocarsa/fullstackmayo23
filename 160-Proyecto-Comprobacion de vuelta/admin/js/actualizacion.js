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
        var tabla = this.getAttribute("tabla")
        var campo = this.getAttribute("campo")
        var identificador = this.getAttribute("identificador")
        var texto = this.innerHTML
        console.log("a fetch le voy a enviar que, en la tabla "+tabla+" voy a modificar el campo "+campo+" en el identificador "+identificador+" y le voy a poner el texto"+texto )
        fetch("inc/actualizacampo.php?tabla="+tabla+"&campo="+campo+"&identificador="+identificador+"&texto="+encodeURI(texto))
        .then(res => res.text())
        .then(res => comprueba(res))
    }
}
function comprueba(res){
    console.log(res)
    if(res == "ok"){
        
    }
}