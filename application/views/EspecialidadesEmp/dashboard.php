<h1>TEST DASHBOARD ESPECIALIDADES</h1>
<form id="altaespecialidad" method ="post" action="altaespecialidad"> 
	<button class="btn btn-default" type="submit">Alta Especialidad</button>
</form>
<?php
	foreach($especialidades as $e){
?>
		<p>><?php echo $e->nombre; ?>
        <a href="bajaespecialidad/<?php echo $e->id; ?>">Borrar</a>
		<a href="editaespecialidad/<?php echo $e->id; ?>">Edita</a></p>
<?php
	}
?>