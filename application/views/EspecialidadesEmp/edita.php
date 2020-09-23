<h1>Edita</h1>
<form id="editaespecialidadbd" method ="post" action="<?php echo site_url('editaespecialidadbd');?>"> 
	<input type="text" name="nombre" id="nombre" value="<?php echo $especialidad->nombre; ?>">
	<input type="hidden" name="id_especialidad" id="id_especialidad" value="<?php echo $especialidad->id; ?>">
	<button class="btn btn-default" type="submit">Confirmar Cambio</button>
</form>