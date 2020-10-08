<h1>TEST DASHBOARD TURNOS</h1>
<form id="altarol" method ="post" action="altarol"> 
	<button class="btn btn-default" type="submit">Alta Turno</button>
</form>
<?php
	foreach($turnos as $t){
?>
	<p>
		<?php 
			echo $t->nombre_cliente; 
		?> 
		<?php 
			echo $t->nombre_empleado; 
		?>
		<?php 
			echo $t->nombre_especialidades_usuarios; 
		?>		
		<?php 
			echo $t->nombre_estado_turno; 
		?>		
		<a href="bajaturno/<?php echo $t->id_turno; ?>">Borrar</a>
		<a href="editaturno/<?php echo $t->id_turno; ?>">Edita</a>
	</p>
<?php
	}
?>