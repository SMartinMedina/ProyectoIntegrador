<?php
/*	echo anchor(
		$seccion.'/baja/'.$id,											//'controller/function/uri', 
		'<i class="fa fa-eye" aria-hidden="true"></i> Ver',		//'Link', 
		''); */
?>
<?php
	echo anchor(
		$seccion.'/baja/'.$id,											//'controller/function/uri', 
		'<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar ',		//'Link', 
		''); 
?>
 | 
<?php
	echo anchor(
		$seccion.'/edita/'.$id,											//'controller/function/uri', 
		'<i class="fa fa-edit" aria-hidden="true"></i> Editar ',		//'Link', 
		''); 
?>													