var nodo;
var datos;
function cargar(id){
    nodo=document.getElementById(id);
    switch(id){
        case 'especialidad':
           multiselect(nodo,'espe','profesional'); 
        break;
        case 'profesional':
            uniselect(nodo, 'profe','labelprofesional');
        break;
        case 'email':
            uniselect(nodo, 'mail')
        break;
    }
}
function multiselect(nodo, oculto, destino,){
       datos="";
    var opciones= nodo.options;
    for(var i=0;i<opciones.length; i++){
        if(opciones[i].selected) {datos+=opciones[i].value};
    }
    document.getElementById(oculto).value=datos;
    recibirPost("resp/".concat(datos,".html"),destino); 
}
function uniselect(nodo, oculto, destino){
    datos=nodo.value;
    document.getElementById(oculto).value=datos;
    recibirPost("resp/".concat(datos,".html"),destino);
}
function reiniciar(){
    location.reload();
}
function enviarmail(){
    location.replace('mail.html')
}