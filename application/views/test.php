<?php
if($cliente==0){
	$mensaje = "";
	$mensaje .= "";
	$mensaje .= "<html><body><table style='width: 100%;'>";
	$mensaje .= "<tr style='background-color: black; height: 50px;color:white;'>";
	$mensaje .= "<td style='padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
	$mensaje .= "<h1><img src='http://www.smartinweb.com/proyectointegrador/img/logo.png'>IL FIGARO</h1></td></tr>";
	$mensaje .= "<tr style='background-color: white;'>";
	$mensaje .= "<td style='padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
	$mensaje .= "<h2>Sistema de Turnos</h2>";
	$mensaje .= "<h2>Hola ".$nombre_cliente."</h2>";
	$mensaje .= "<p>Llego su turno, acerquese a la recepcion para que le indique que puesto recibira el servicio. Le brindamos como maximo 15 minutos de espera, luego de esto prodriamos cancelar su turno.</p></td></tr>";
	$mensaje .= "<tr style='background-color: white;'>";
	$mensaje .= "</td></tr><tr style='background-color: black; height: 50px;color:white;'>"; 
	$mensaje .= "<td style=' padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
	$mensaje .= "<h2>Gracias por confiar en nuestro sistema.</h2><p>";
	$mensaje .= "Si desea sacar mas turnos o cancela este turno,";
	$mensaje .= " podes consultarlo en el siguiente";
	$mensaje .= "<a href='http://www.smartinweb.com/proyectointegrador'>";
	$mensaje .= "link </a></p></td></tr></table></body></html>";
}else if($cliente==1){
			
	$mensaje = "";
	$mensaje .= "";
	$mensaje .= "<html><body><table style='width: 100%;'>";
	$mensaje .= "<tr style='background-color: black; height: 50px;color:white;'>";
	$mensaje .= "<td style='padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
	$mensaje .= "<h1><img src='http://www.smartinweb.com/proyectointegrador/img/logo.png'>IL FIGARO</h1></td></tr>";
	$mensaje .= "<tr style='background-color: white;'>";
	$mensaje .= "<td style='padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
	$mensaje .= "<h2>Sistema de Turnos</h2>";
	$mensaje .= "<h2>Hola ".$nombre_cliente."</h2>";
	$mensaje .= "<p>Pronto, en ".$cant_minutos_demora." minutos, lo atenderemos a usted. Por favor, acerquese a la peluqueria</p></td></tr>";
	$mensaje .= "<tr style='background-color: white;'>";
	$mensaje .= "</td></tr><tr style='background-color: black; height: 50px;color:white;'>"; 
	$mensaje .= "<td style=' padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
	$mensaje .= "<h2>Gracias por confiar en nuestro sistema.</h2><p>";
	$mensaje .= "Si desea sacar mas turnos o cancela este turno,";
	$mensaje .= " podes consultarlo en el siguiente";
	$mensaje .= "<a href='http://www.smartinweb.com/proyectointegrador'>";
	$mensaje .= "link </a></p></td></tr></table></body></html>";
	
	
}else{
	$mensaje = "";
	$mensaje .= "";
	$mensaje .= "<html><body><table style='width: 100%;'>";
	$mensaje .= "<tr style='background-color: black; height: 50px;color:white;'>";
	$mensaje .= "<td style='padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
	$mensaje .= "<h1><img src='http://www.smartinweb.com/proyectointegrador/img/logo.png'>IL FIGARO</h1></td></tr>";
	$mensaje .= "<tr style='background-color: white;'>";
	$mensaje .= "<td style='padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
	$mensaje .= "<h2>Sistema de Turnos</h2>";
	$mensaje .= "<h2>Hola ".$nombre_cliente."</h2>";
	$mensaje .= "<p>Faltan ".$cliente." personas que debemos atender antes de que le podamos prestar nuestros servicios. Estimamos que le faltan ".$cant_minutos_demora." minutos para se atendido. Por favor, sea paciente y este atento a nuestas aletas.</p></td></tr>";
	$mensaje .= "<tr style='background-color: white;'>";
	$mensaje .= "</td></tr><tr style='background-color: black; height: 50px;color:white;'>"; 
	$mensaje .= "<td style=' padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
	$mensaje .= "<h2>Gracias por confiar en nuestro sistema.</h2><p>";
	$mensaje .= "Te recomendamos que estés pendiente a las alertas que te estaremos enviando para el seguimiento";
	$mensaje .= "del estado de tu turno.<br /><br /> Podes consultarlo en el siguiente";
	$mensaje .= "<a href='http://www.smartinweb.com/proyectointegrador'>";
	$mensaje .= "link </a></p></td></tr></table></body></html>";
	

}
                        echo $mensaje;
    ?>