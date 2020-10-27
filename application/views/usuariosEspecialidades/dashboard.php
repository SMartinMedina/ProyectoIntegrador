<h1>TEST DASHBOARD Usuarios Especialidades</h1>
<form id="altausuarioespecialidad" method ="post" action="altausuarioespecialidad"> 
	<button class="btn btn-default" type="submit">Alta Usuarios Especialidades</button>
</form>
<?php
	foreach($usuariosEspecialidades as $ue){
?>
		<p><?php 
			echo $ue->nombre_empleado; 
			echo $ue->nombre_especialidad_empleado;
			?> 
		<a href="bajarol/<?php echo $ue->id; ?>">Borrar</a>
		<a href="editarol/<?php echo $ue->id; ?>">Edita</a></p>

<?php
	}
?>