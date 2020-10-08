<h1>Edita</h1>
<form id="editarolbd" method ="post" action="<?php echo site_url('editarolbd');?>"> 
	<input type="text" name="nombre" id="nombre" value="<?php echo $rol->nombre; ?>">
	<input type="hidden" name="id_rol" id="id_rol" value="<?php echo $rol->id; ?>">
	<button class="btn btn-default" type="submit">Confirmar Cambio</button>
</form>
