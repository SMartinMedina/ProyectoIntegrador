function ubicarScript(destino, recibir){     
    var inicioScript = recibir.indexOf('<script>'); 
    if (inicioScript < 0) { 
        var textoHtml = recibir
    }else{
        var textoHtml = recibir.slice(0,inicioScript);
    }
    document.getElementById(destino).innerHTML = textoHtml;    
    if (inicioScript >0){
        if (document.getElementById('script' + destino) != null){ 
            var viejoScript = document.getElementById('script' + destino)
            var padre = viejoScript.parentNode; 
            padre.removeChild(viejoScript);
        }
        let finScript = recibir.indexOf('</script>');
        let textoScript = recibir.slice(inicioScript + 8, finScript);
        let nuevoScript = document.createElement('script');
        nuevoScript.id = 'script' + destino;
        let textnode = document.createTextNode(textoScript);
        nuevoScript.appendChild(textnode);
        if (textoScript !='' ) document.body.appendChild(nuevoScript);    
    }
}

function recibirPost(archivo, destino, datos=[]){
    var xmlHttp = new XMLHttpRequest(); 
    xmlHttp.onreadystatechange=function(){
        if(xmlHttp.readyState==4 && xmlHttp.status==200){ 
            var respuesta= xmlHttp.responseText;
            ubicarScript(destino, respuesta);
        }
    } 
    xmlHttp.open('POST', archivo, true);
    xmlHttp.send(datos);
}

function cargarDatos(matriz, archivo, destino, callback){
    var datos=new FormData;
    for (var[llave, valor] of Object.entries(matriz)){
        datos. append(llave, valor);
    }
    callback(archivo, destino, datos, ubicarScrip);
}