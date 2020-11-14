<?php
    if($this->session->userdata('id_rol_usuario') == 2){
        if(isset($horario_salida)){
            echo anchor(

                $seccion.'/disponibilidad/'.$id_empleado,           
                '<button class="btn btn-success"> Habilitar</button>',      //'Link', 
                'class=""');
        }else if(isset($horario_entrada)){
           
            echo anchor(
                $seccion.'/noDisponibilidad/'.$id_empleado,         
                '<button class="btn btn-success"> Deshabilitar</button>',       //'Link', 
                'class=""'
                );
        }
    }else if($this->session->userdata('id_rol_usuario') == 4){
               if(isset($horario_salida)){
                    echo anchor(

                        $seccion.'/disponibilidad/'.$id_empleado,           
                        '<i class="fa fa-edit" aria-hidden="true"></i> Habilitar ',     //'Link', 
                        '');
                }else if(isset($horario_entrada)){
                   
                    echo anchor(
                        $seccion.'/noDisponibilidad/'.$id_empleado,         
                        '<i class="fa fa-edit" aria-hidden="true"></i> Deshabilitar ',      //'Link', 
                        '');
                }
            }
?>
