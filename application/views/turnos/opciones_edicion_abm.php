<?php
    if(($this->session->userdata('id_rol_usuario') == 2)||($this->session->userdata('id_rol_usuario') == 4)){
        if($id_estado==1){
            echo anchor(
                $seccion.'/inicializar/'.$id,			
                '<i class="fa fa-edit" aria-hidden="true"></i> Atender ',		//'Link', 
                '');
        }else if($id_estado==2){
            echo anchor(
                $seccion.'/finalizar/'.$id,									//'controller/function/uri', 
                '<i class="fa fa-edit" aria-hidden="true"></i> Finalizar ',		//'Link', 
                '');
        }
    }else if($this->session->userdata('id_rol_usuario') == 3){
        echo anchor(
            $seccion.'/cancelar/'.$id,									//'controller/function/uri', 
            '<i class="fa fa-edit" aria-hidden="true"></i> Cancelar ',		//'Link', 
            '');
    }
?>
