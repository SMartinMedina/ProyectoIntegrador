<?php
        $x=0;
        foreach($empleados as $e){
            if(isset($e->horario_entrada)){
               $x=$x+1;
            }
        }
        if($x==0){
            echo anchor(
                $seccion.'/disponiblesTodos/',			
                '<button class="btn btn-success">Habilitar Especialistas</button>',		//'Link', 
                'class=""');
        }else if($x==sizeof($empleados)){
            
                echo anchor(
                    $seccion.'/noDisponiblesTodos/',			
                    '<button class="btn btn-success">Deshabilitar Especialistas</button>',		//'Link', 
                    'class=""');
        }else{
            echo anchor(
                $seccion.'/disponiblesTodos/',			
                '<button class="btn btn-success">Habilitar Especialistas</button> ',		//'Link', 
                'class=""');  

            echo anchor(
                $seccion.'/noDisponiblesTodos/',		
                '<button class="btn btn-success">Deshabilitar Especialistas</button>',		//'Link', 
                'class=""');
        }
        
    ?>