<?php
               if(isset($horario_salida)){
                    echo anchor(

                        $seccion.'/disponibilidad/'.$id_empleado,			
                        '<i class="fa fa-edit" aria-hidden="true"></i> Habilitar ',		//'Link', 
                        '');
                }else if(isset($horario_entrada)){
                   
                    echo anchor(
                        $seccion.'/noDisponibilidad/'.$id_empleado,			
                        '<i class="fa fa-edit" aria-hidden="true"></i> Deshabilitar ',		//'Link', 
                        '');
                }
  
?>